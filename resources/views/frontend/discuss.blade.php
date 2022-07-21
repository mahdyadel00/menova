@extends('frontend.layouts.master')

@section('title')
@endsection

@section('style')

@endsection

@section('content')
 <!-- Breadcrumbs -->
 <section class="breadcrumbs">

    <div class="container">
      <div class="breadcrumbs-text ">
        <ol>
          <li><a href="/" class="breadcrumbs-link"></a>Home</li>
          <li><a href="/about" class="breadcrumbs-link">about</a></li>
          <li><a href="/services" class="breadcrumbs-link">services</a></li>
          <li><a href="/connect" class="breadcrumbs-link">connect</a></li>
          <li><a href="/raise" class="breadcrumbs-link">raise</a></li>
        </ol>
        <h1>Disucss</h1>
      </div>
    </div>
  </section>
  <!-- End Breadcrumbs -->
  <!-- start discuss .................... -->
<section class="discuss">
  <div class="container-fluid  pt-5 pb-2 bg-light" data-aos="fade-up">
    <div class="row ">
        <div class = "col-md-3 ">

        <button id="myBtn" class="btn btn-sub m-left">Ask Question</button>

                <!-- The Modal -->
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>

                    <form class='' action = "" method='POST' enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title </label>
                                <input type="text" class="form-control" id="title" name='title' required
                                    placeholder='Please Enter Your Title'>
                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label">Discuss Now </label>
                                <textarea class="form-control" id="body" name='body' required
                                    placeholder='Please Enter Your question'></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">

                        <button type="submit" id ='ask' name = 'ask' class="btn btn-sub">Ask</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
        <div class = "col-md-6 pb-4 tab-content" id="pills-tabContent">

        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">


        <div class="card mb-3 ">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <ul class="list-inline m-3">
                    <li class="list-inline-item">
                        <i class="bi bi-person"></i>
                        <a  href="/discuss-single" > John Doe</a>
                    </li>
                    <li class="list-inline-item">
                        <i class="bi bi-clock"></i>
                         <a href="/discuss-single" >
                          <time datetime="2020-01-01"> Jan 1, 2020</time>
                        </a>
                    </li>
                  </ul>
                  <p class="card-text">With supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional content.</p>
                  <div class="d-flex align-items-center">
                    <a href="/discuss-single">
                         <i class="bi bi-chat-dots sub-color"></i>
                         comment
                    </a>
                </div>
                </div>
              </div>

              <div class="card mb-3">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <ul class="list-inline m-3">
                    <li class="list-inline-item">
                    <i class="bi bi-person"></i>
                    <a  href="/discuss-single"> John Doe</a>
                   </li>
                    <li class="list-inline-item">
                        <i class="bi bi-clock"></i>
                        <a href="/discuss-single">
                            <time datetime="2020-01-01"> Jan 1, 2020</time>
                        </a>
                    </li>
                  </ul>

                  <p class="card-text">With supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional content.</p>
                  <div class="d-flex align-items-center">
                    <a href="/discuss-single" >
                        <i class="bi bi-chat-dots "></i> Comments
                    </a>
                </div>
                </div>
              </div>

              <div class="card mb-3">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <ul class="list-inline m-3">
                    <li class="list-inline-item"><i class="bi bi-person"></i> <a  href="/discuss-single"> John Doe</a></li>
                    <li class="list-inline-item"><i class="bi bi-clock"></i> <a href="/discuss-single"><time datetime="2020-01-01"> Jan 1, 2020</time></a></li>
                  </ul>

                  <p class="card-text">With supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional content.</p>
                  <div class="d-flex align-items-center">
                    <a href="/discuss-single"> <i class="bi bi-chat-dots"></i> Comments</a>
                </div>
                </div>
              </div>

        </div>

        <div class="tab-pane fade" id="pills-marketing" role="tabpanel" aria-labelledby="pills-marketing-tab" tabindex="0">

        <div class="card mb-3">
                <div class="card-body">
                  <h5 class="card-title">Special marketing</h5>
                  <ul class="list-inline m-3">
                    <li class="list-inline-item"><i class="bi bi-person"></i> <a  href="/discuss-single"> John Doe</a></li>
                    <li class="list-inline-item"><i class="bi bi-clock"></i> <a href="/discuss-single"><time datetime="2020-01-01"> Jan 1, 2020</time></a></li>
                  </ul>

                  <p class="card-text">With supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional content.</p>
                  <div class="d-flex align-items-center">
                    <a href="/discuss-single"> <i class="bi bi-chat-dots"></i> Comments</a>
                </div>
                </div>
              </div>

              <div class="card mb-3">
                <div class="card-body">
                  <h5 class="card-title">Special marketing </h5>
                  <ul class="list-inline m-3">
                    <li class="list-inline-item"><i class="bi bi-person"></i> <a  href="/discuss-single"> John Doe</a></li>
                    <li class="list-inline-item"><i class="bi bi-clock"></i> <a href="/discuss-single"><time datetime="2020-01-01"> Jan 1, 2020</time></a></li>
                  </ul>

                  <p class="card-text">With supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional content.</p>
                  <div class="d-flex align-items-center">
                    <a href="/discuss-single"> <i class="bi bi-chat-dots"></i> Comments</a>
                </div>
                </div>
              </div>

        </div>

        <div class="tab-pane fade" id="pills-sales" role="tabpanel" aria-labelledby="pills-sales-tab" tabindex="0">

        <div class="card mb-3">
                <div class="card-body">
                  <h5 class="card-title">Special sales </h5>
                  <ul class="list-inline m-3">
                    <li class="list-inline-item"><i class="bi bi-person"></i> <a  href="/discuss-single"> John Doe</a></li>
                    <li class="list-inline-item"><i class="bi bi-clock"></i> <a href="/discuss-single"><time datetime="2020-01-01"> Jan 1, 2020</time></a></li>
                  </ul>

                  <p class="card-text">With supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional content.</p>
                  <div class="d-flex align-items-center">
                    <a href="/discuss-single" > <i class="bi bi-chat-dots"></i> Comments</a>
                </div>
                </div>
              </div>

              <div class="card mb-3">
                <div class="card-body">
                  <h5 class="card-title">Special sales </h5>
                  <ul class="list-inline m-3">
                    <li class="list-inline-item"><i class="bi bi-person"></i> <a  href="/discuss-single"> John Doe</a></li>
                    <li class="list-inline-item"><i class="bi bi-clock"></i> <a href="/discuss-single"><time datetime="2020-01-01"> Jan 1, 2020</time></a></li>
                  </ul>

                  <p class="card-text">With supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional content.</p>
                  <div class="d-flex align-items-center">
                    <a href="/discuss-single"> <i class="bi bi-chat-dots"></i> Comments</a>
                </div>
                </div>
              </div>

        </div>

        <div class="tab-pane fade" id="pills-hr" role="tabpanel" aria-labelledby="pills-hr-tab" tabindex="0">

<div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title">Special hr </h5>
          <ul class="list-inline m-3">
            <li class="list-inline-item"><i class="bi bi-person"></i> <a  href="/discuss-single"> John Doe</a></li>
            <li class="list-inline-item"><i class="bi bi-clock"></i> <a href="/discuss-single"><time datetime="2020-01-01"> Jan 1, 2020</time></a></li>
          </ul>

          <p class="card-text">With supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional content.</p>
          <div class="d-flex align-items-center">
            <a href="/discuss-single"> <i class="bi bi-chat-dots"></i> Comments</a>
        </div>
        </div>
      </div>

      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title">Special hr</h5>
          <ul class="list-inline m-3">
            <li class="list-inline-item"><i class="bi bi-person"></i> <a  href="/discuss-single"> John Doe</a></li>
            <li class="list-inline-item"><i class="bi bi-clock"></i> <a href="/discuss-single"><time datetime="2020-01-01"> Jan 1, 2020</time></a></li>
          </ul>

          <p class="card-text">With supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional contentWith supporting text below as a natural lead-in to additional content.</p>
          <div class="d-flex align-items-center">
            <a href="/discuss-single"> <i class="bi bi-chat-dots"></i> Comments</a>
        </div>
        </div>
      </div>

</div>



        </div>
        <div class = "col-md-3 side-bar">
            <ul class="list-group" id="pills-tab" role="tablist">

                <li class="list-group-item d-flex justify-content-between align-items-center">
                <a class="nav-link " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"> Trending</a>
                <span class="badge  rounded-pill">2</span>
                </li>

               

                <li class="list-group-item d-flex justify-content-between align-items-center">
                <a class="nav-link" id="pills-sales-tab" data-bs-toggle="pill" data-bs-target="#pills-sales"  role="tab" aria-controls="pills-sales" aria-selected="false">sales</a>
                  <span class="badge  rounded-pill">1</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                <a class="nav-link" id="pills-hr-tab" data-bs-toggle="pill" data-bs-target="#pills-hr"  role="tab" aria-controls="pills-hr" aria-selected="false">hr</a>
                    <span class="badge  rounded-pill">14</span>
                  </li>


              </ul>
        </div>

    </div>

<!-- Modal -->


    <!-- Modal
<div class="modal fade" id="ask-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ask-modelLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ask-modelLabel">Ask Question</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class='' action = "" method='POST' enctype="multipart/form-data">
        <div class="modal-body">
            <div class="mb-3">
                <label for="title" class="form-label">Title </label>
                <input type="text" class="form-control" id="title" name='title' required
                    placeholder='Please Enter Your Title'>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Discuss Now </label>
                <textarea class="form-control" id="body" name='body' required
                    placeholder='Please Enter Your question'></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <div class="d-flex justify-content-start">
                <button type="button" class="btn btn-light text-right" data-bs-dismiss="modal">Close</button>

            </div>
          <button type="submit" id ='ask' name = 'ask' class="btn btn-sub">Ask</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  </div>
--><!-- Modal
<div class="modal " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
-->
<!--
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Show a second modal and hide this one with the button below.
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button>
      </div>
    </div>
  </div>
</div>
</section>
-->
@endsection

@section('script')

@endsection
