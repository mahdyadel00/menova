<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactRequest;
use App\Mail\ContactReplyMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_contacts')->only(['index']);
        $this->middleware('permission:create_contacts')->only(['create', 'store']);
        $this->middleware('permission:read_contacts')->only(['show']);
        $this->middleware('permission:update_contacts')->only(['edit', 'update']);
        $this->middleware('permission:delete_contacts')->only(['delete', 'bulk_delete']);
    } // end of __construct

    public function index()
    {
        return view('admin.contacts.index');
    } // end of index

    public function data()
    {
        $contacts = Contact::select();

        return DataTables::of($contacts)
            ->addColumn('record_select', 'admin.contacts.data_table.record_select')
            ->editColumn('created_at', function (Contact $contact) {
                return $contact->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.contacts.data_table.actions')
            ->rawColumns(['record_select', 'actions'])
            ->toJson();
    } // end of data


    public function create()
    {
    } // end of create

    public function store(Request $request)
    {
    } // end of store

    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    } // end of show

    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    } // end of edit

    public function update(Request $request, Contact $contact)
    {
    } // end of update

    public function replay(ContactRequest $request, int $id)
    {
        $contact = Contact::findOrFail($id);
        $data = [
            'subject' => $contact->subject,
            'name' => $contact->name,
            'reply' => $request->reply,
        ];
        Mail::to($contact->email)->send(new ContactReplyMail($data));
        session()->flash('success', __('site.mail_sent_successfully'));
        return redirect()->route('admin.contacts.index');
    }

    public function destroy(Contact $contact)
    {
        $this->delete($contact);
        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of destroy

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $contact = Contact::FindOrFail($recordId);
            $this->delete($contact);
        } //end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of bulkDelete

    private function delete(Contact $contact)
    {
        $contact->delete();
    } // end of delete

}//end of controller