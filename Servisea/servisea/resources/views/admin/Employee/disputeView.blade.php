<!DOCTYPE html>
<html lang="en">

@extends('user.user_master')

@section('user_page')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
@stop
@section('user_style')
<style>
.rating-header {
    margin-top: -10px;
    margin-bottom: 10px;
}
</style>


@stop

@section('user-main-content')
<div class="dashboard_content_wrapper">
    <div class="dashboard dashboard_wrapper pr30 pr0-xl">
      <div class="dashboard__main pl0-md" style="padding-left: 0;margin-top: 0px;">
        <div class="dashboard__content hover-bgc-color">
          <div class="row mb40">
            <div class="col-lg-6 col-xl-7 col-xxl-8" style="width: 100%;">
              <div class="message_container mt30-md">
                <div class="user_heading px-0 mx30">
                  <div class="wrap">
                    <img class="img-fluid mr10" src="images/inbox/ms3.png" alt="ms3.png">
                    <div class="meta d-sm-flex justify-content-sm-between align-items-center">
                      <div class="authors">
                      @if(isset($dispute))
                       @foreach($dispute as $dis)
                        <h6 class="name mb-0">{{$dis->USERNAME}} </h6>
                        <p class="preview">Active</p>
                        @endforeach
                      @endif
                      </div>
                      <div>
                    @if($dispute[0]->DISPUTE_STATUS == "PENDING")
                      @if($dispute[0]->ORDER_ID)
                      <a type="button" class="ud-btn btn-warning no-border" data-toggle="modal" data-target="#disputeModal">Close Order</a>
                      @endif
                    @endif
                    @if(!isset($refunds))
                        <a type="button" class="ud-btn btn-warning no-border" href="{{route('issueRefund',[Crypt::encryptString($dispute[0]->ORDER_ID),Crypt::encryptString($dispute[0]->DISPUTE_ID)])}}">Issue Refund</a>
                      @else
                      <a type="button" class="ud-btn btn-warning no-border">Refund Issued</a>
                      @endif
                    <a type="button" class="ud-btn btn-warning no-border" href="{{route('orderDetails',Crypt::encryptString($dispute[0]->ORDER_ID))}}">view Order</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="inbox_chatting_box" style="">
                  <ul class="chatting_content">
                    <li class="sent float-start">
                      <div class="d-flex align-items-center mb15">
                        <img class="img-fluid rounded-circle align-self-start mr10" src="images/inbox/ms4.png" alt="ms4.png">
                        <div class="title fz15">Albert Flores <small class="ml10">35 mins</small></div>
                      </div>
                      <p>How likely are you to recommend our company to your friends and family?</p>
                    </li>
                    <li class="reply float-end">
                      <div class="d-flex align-items-center justify-content-end mb15">
                        <div class="title fz15"><small class="mr10">35 mins</small> You</div>
                        <img class="img-fluid rounded-circle align-self-end ml10" src="images/inbox/ms5.png" alt="ms5.png">
                      </div>
                      <p>Hey there, we’re just writing to let you know that you’ve been subscribed to a repository on GitHub.</p>
                    </li>
                    <li class="sent float-start">
                      <div class="d-flex align-items-center mb15">
                        <img class="img-fluid rounded-circle align-self-start mr10" src="images/inbox/ms5.png" alt="ms5.png">
                        <div class="title fz15">Albert Flores <small class="ml10">35 mins</small></div>
                      </div>
                      <p>Ok, Understood!</p>
                    </li>
                    <li class="reply float-end">
                      <div class="d-flex align-items-center justify-content-end mb15">
                        <div class="title fz15"><small class="mr10">35 mins</small> You</div>
                        <img class="img-fluid rounded-circle align-self-end ml10" src="images/inbox/ms5.png" alt="ms5.png">
                      </div>
                      <p>The project finally complete! Let's go to!.</p>
                    </li>
                    <li class="sent float-start">
                      <div class="d-flex align-items-center mb15">
                        <img class="img-fluid rounded-circle align-self-start mr10" src="images/inbox/ms2.png" alt="ms2.png">
                        <div class="title fz15">Albert Flores <small class="ml10">35 mins</small></div>
                      </div>
                      <p>Let's go!</p>
                    </li>
                    <li class="sent float-start">
                      <div class="d-flex align-items-center mb15">
                        <img class="img-fluid rounded-circle align-self-start mr10" src="images/inbox/ms2.png" alt="ms2.png">
                        <div class="title fz15">Albert Flores <small class="ml10">35 mins</small></div>
                      </div>
                      <p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
                    </li>
                    <li class="sent float-start">
                      <div class="d-flex align-items-center mb15">
                        <img class="img-fluid rounded-circle align-self-start mr10" src="images/inbox/ms2.png" alt="ms2.png">
                        <div class="title fz15">Albert Flores <small class="ml10">35 mins</small></div>
                      </div>
                      <p>Hello, John!</p>
                    </li>
                    <li class="reply float-end">
                      <div class="d-flex align-items-center justify-content-end mb15">
                        <div class="title fz15"><small class="mr10">35 mins</small> You</div>
                        <img class="img-fluid rounded-circle align-self-end ml10" src="images/inbox/ms3.png" alt="ms3.png">
                      </div>
                      <p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
                    </li>
                    <li class="reply float-end">
                      <div class="d-flex align-items-center justify-content-end mb15">
                        <div class="title fz15"><small class="mr10">35 mins</small> You</div>
                        <img class="img-fluid rounded-circle align-self-end ml10" src="images/inbox/ms3.png" alt="ms3.png">
                      </div>
                      <p>Are we meeting today?</p>
                    </li>
                    <li class="reply float-end">
                      <div class="d-flex align-items-center justify-content-end mb15">
                        <div class="title fz15"><small class="mr10">35 mins</small> You</div>
                        <img class="img-fluid rounded-circle align-self-end ml10" src="images/inbox/ms3.png" alt="ms3.png">
                      </div>
                      <p>The project finally complete! Let's go to!</p>
                    </li>
                    <li class="sent float-start">
                      <div class="d-flex align-items-center mb15">
                        <img class="img-fluid rounded-circle align-self-start mr10" src="images/inbox/ms2.png" alt="ms2.png">
                        <div class="title fz15">Albert Flores <small class="ml10">35 mins</small></div>
                      </div>
                      <p>Let's go!</p>
                    </li>
                    <li class="sent float-start">
                      <div class="d-flex align-items-center mb15">
                        <img class="img-fluid rounded-circle align-self-start mr10" src="images/inbox/ms2.png" alt="ms2.png">
                        <div class="title fz15">Albert Flores <small class="ml10">35 mins</small></div>
                      </div>
                      <p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
                    </li>
                    <li class="reply float-end">
                      <div class="d-flex align-items-center justify-content-end mb15">
                        <div class="title fz15"><small class="mr10">35 mins</small> You</div>
                        <img class="img-fluid rounded-circle align-self-end ml10" src="images/inbox/ms3.png" alt="ms3.png">
                      </div>
                      <p>Are we meeting today?</p>
                    </li>
                    <li class="reply float-end">
                      <div class="d-flex align-items-center justify-content-end mb15">
                        <div class="title fz15"><small class="mr10">35 mins</small> You</div>
                        <img class="img-fluid rounded-circle align-self-end ml10" src="images/inbox/ms3.png" alt="ms3.png">
                      </div>
                      <p>The project finally complete! Let's go to!</p>
                    </li>
                    <li class="sent float-start">
                      <div class="d-flex align-items-center mb15">
                        <img class="img-fluid rounded-circle align-self-start mr10" src="images/inbox/ms2.png" alt="ms2.png">
                        <div class="title fz15">Albert Flores <small class="ml10">35 mins</small></div>
                      </div>
                      <p>Let's go!</p>
                    </li>
                    <li class="sent float-start">
                      <div class="d-flex align-items-center mb15">
                        <img class="img-fluid rounded-circle align-self-start mr10" src="images/inbox/ms2.png" alt="ms2.png">
                        <div class="title fz15">Albert Flores <small class="ml10">35 mins</small></div>
                      </div>
                      <p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
                    </li>
                  </ul>
                </div>
                <div class="mi_text">
                  <div class="message_input">
                    <form class="d-flex align-items-center">
                      <input class="form-control" type="search" placeholder="Type a Message" aria-label="Search">
                      <button class="btn ud-btn btn-thm">Send Message<i class="fal fa-arrow-right-long"></i></button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @if($dispute[0]->DISPUTE_STATUS == "PENDING")
    <div class="modal fade" id="disputeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Dispute Solution</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('closeDispute',Crypt::encryptString($dispute[0]->DISPUTE_ID))}}" method="POST">
            @csrf
      <div class="modal-body">
        <div class="col-md-12">
            <div class="mb10">
                <label class="heading-color ff-heading fw500 mb10">Dispute Solution</label>
                <textarea cols="30" rows="6" name="Solution_Description" placeholder="Description of Solution"></textarea>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Close Dispute</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endif
  </div>

@stop

@section('user_script')

    <!-- JS -->
    <!-- rating.js file -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

@stop


