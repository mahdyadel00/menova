<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DomainRequest;
use App\Models\Domain;
use App\Traits\UploadImage;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DomainController extends Controller
{
    use UploadImage;

    public function __construct()
    {
        $this->middleware('permission:read_domains')->only(['index']);
        $this->middleware('permission:create_domains')->only(['create', 'store']);
        $this->middleware('permission:update_domains')->only(['edit', 'update']);
        $this->middleware('permission:delete_domains')->only(['delete', 'bulk_delete']);
    } // end of __construct

    public function index()
    {
        return view('admin.domains.index');
    } // end of index

    public function data()
    {
        $domains = Domain::select();

        return DataTables::of($domains)
            ->addColumn('record_select', 'admin.domains.data_table.record_select')
            ->editColumn('created_at', function (Domain $type) {
                return $type->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'admin.domains.data_table.actions')
            ->rawColumns(['record_select', 'actions'])
            ->toJson();
    } // end of data

    public function create()
    {
        return view('admin.domains.create');
    } // end of create

    public function store(DomainRequest $request)
    {
        $data = [];
        foreach (config('translatable.locales') as $locale) {
            $data[$locale] = [
                'name' => $request->input($locale . '_name')
            ];
        }

        if ($request->image) {
            $data['image'] = $this->uploadImage($request->image, 'domains');
        }

        Domain::create($data);

        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.domains.index');
    } // end of store

    public function show(Domain $domain)
    {
        return redirect()->route('admin.domains.index');
    } // end of show

    public function edit(Domain $domain)
    {
        return view('admin.domains.edit', compact('domain'));
    } // end of edit

    public function update(DomainRequest $request, Domain $domain)
    {
        $data = [];

        foreach (config('translatable.locales') as $locale) {
            $data[$locale] = [
                'name' => $request->input($locale . '_name')
            ];
        }

        if ($request->image) {
            if ($domain->hasImage()) {
                $this->deleteImage($domain->image, 'domains');
            }
            $data['image'] = $this->uploadImage($request->image, 'domains');
        }

        $domain->update($data);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.domains.index');
    } // end of update

    public function destroy(Domain $domain)
    {
        $this->delete($domain);
        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of destroy

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $domain = Domain::FindOrFail($recordId);
            $this->delete($domain);
        } //end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));
    } // end of bulkDelete

    private function delete(Domain $domain)
    {
        if ($domain->hasImage()) {
            $this->deleteImage($domain->image, 'domains');
        }
        $domain->delete();
    } // end of delete

}//end of controller