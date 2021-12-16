@extends('vendor.layout.app')

@section ('content')


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.0/sweetalert2.min.css"
        integrity="sha512-qZl4JQ3EiQuvTo3ccVPELbEdBQToJs6T40BSBYHBHGJUpf2f7J4DuOIRzREH9v8OguLY3SgFHULfF+Kf4wGRxw=="
        crossorigin="anonymous" />
        
        <style>
       
.ans-main-wrapper{
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.ans-main-container{
    background-color: #fff;
}
.ans-main-row{
    display: flex;
}
 .ans-profile-image {
	 width: 50px;
	 height: 50px;
	 border-radius: 40px;
}

 .ans-input-filed {
	 border: none;
	 border-radius: 30px;
	 width: 80%;
}
 .ans-input-filed::placeholder {
	 color: #e3e3e3;
	 font-weight: 300;
	 margin-left: 20px;
}
 .ans-input-filed:focus {
	 outline: none;
}
 .ans-friend-drawer {
	 padding: 10px 15px;
	 display: flex;
	 vertical-align: baseline;
     justify-content: space-between;
	 background: #fff;
	 transition: 0.3s ease;
}
.ans-chat-header {
	 padding: 10px 15px;
	 background: #d8d7d7;
	 transition: 0.3s ease;
}
 .ans-friend-drawer--grey {
	 background: #4b2669;
     color: #fff;
}
 .ans-friend-drawer .ans-text {
	 margin-left: 12px;
	 width: 70%;
}
 .ans-friend-drawer .ans-text h6 {
	 margin-top: 6px;
	 margin-bottom: 0;
}
 .ans-friend-drawer .ans-text p {
	 margin: 0;
}
 .ans-friend-drawer .time {
	 color: grey;
}
 hr {
	 margin: 5px auto;
	 width: 60%;
}
 .ans-chat-bubble {
	 padding: 10px 14px;
	 background: #d8d7d7;
	 margin: 10px 30px;
	 border-radius: 9px;
	 position: relative;
	 animation: fadeIn 1s ease-in;
}
 .ans-chat-bubble:after {
	 content: '';
	 position: absolute;
	 top: 50%;
	 width: 0;
	 height: 0;
	 border: 20px solid transparent;
	 border-bottom: 0;
	 margin-top: -10px;
}
 .ans-chat-bubble--left:after {
	 left: 0;
	 border-right-color: #eee;
	 border-left: 0;
	 margin-left: -20px;
}
 .ans-chat-bubble--right:after {
	 right: 0;
	 border-left-color: #313131;
	 border-right: 0;
	 margin-right: -20px;
}
 @keyframes fadeIn {
	 0% {
		 opacity: 0;
	}
	 100% {
		 opacity: 1;
	}
}

.ans-chat-bubble--left{
     background-color: #d8d7d7;
     color: #333;
}
.ans-chat-bubble--right{
    background-color: #313131;
    color: #fff;
}
 .ans-chat-box-tray {
	 background: #d8d7d7;
	 display: flex;
	 align-items: baseline;
     justify-content: space-between;
	 padding: 10px 15px;
	 align-items: center;
	 margin-top: 19px;
	 bottom: 0;
}
.ans-input-filed{
    width: 100%;
    padding-left: 8px;
    padding: 6px 15px;
	 margin: 0 10px;

}
.ans-input-filed::placeholder{
    color: #4b2669;
}
@media(max-width:576px){
.ans-main-container{
    width: 90%;
}
} 
.ans-back-arrow{
    margin-left: 18px;
}  
.ans-chat-send-btn{
    padding: 8px;
    background: #4b2669;
    border-radius: 50px;
    color: #fff;
    font-size: 18px;
    text-align: center;
}
.ans-chat-panel{
    height: 500px;
    overflow: auto;
    overflow-x: hidden;
}
 </style>



    <div class="ans-main-wrapper">
        <div class="container ans-main-container">
            <div class="row ans-main-row">
              <div class="col-md-12 px-0">
                <div class="ans-settings-tray">
                    <div class="ans-chat-header ans-friend-drawer--grey">
                    <div class="row">
                        <div class="col-4">
                            <span class="fa fa-arrow-left ans-back-arrow"></span>
                        </div>
                        <div class="col-4">
                            <div class="ans-text text-center">
                                <h6 class="mb-0">Robo Cop</h6>
                              </div>
                        </div>
                        <div class="col-4"></div>
                    </div>
                    
                    <!-- <span class="settings-tray--right">
                      <i class="material-icons">cached</i>
                      <i class="material-icons">message</i>
                      <i class="material-icons">menu</i>
                    </span> -->
                  </div>
                </div>
              </div>
              <div class="col-md-12 px-0">
                <div class="ans-chat-panel">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-10">
                      <div class="ans-chat-bubble ans-chat-bubble--left">
                        Hello dude!
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 offset-lg-9 col-md-6 offset-md-6 offset-2 col-10">
                      <div class="ans-chat-bubble ans-chat-bubble--right">

                        Hello dude!
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 offset-lg-9 col-md-6 offset-md-6 offset-2 col-10">
                      <div class="ans-chat-bubble ans-chat-bubble--right">
                        Hello dude!
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-10">
                      <div class="ans-chat-bubble ans-chat-bubble--left">
                        Hello dude!
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-10">
                      <div class="ans-chat-bubble ans-chat-bubble--left">
                        Hello dude!
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-10">
                      <div class="ans-chat-bubble ans-chat-bubble--left">
                        Hello dude!
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-10">
                      <div class="ans-chat-bubble ans-chat-bubble--left">
                        Hello dude!
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-10">
                      <div class="ans-chat-bubble ans-chat-bubble--left">
                        Hello dude!
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-10">
                      <div class="ans-chat-bubble ans-chat-bubble--left">
                        Hello dude!
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-10">
                      <div class="ans-chat-bubble ans-chat-bubble--left">
                        Hello dude!
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-10">
                      <div class="ans-chat-bubble ans-chat-bubble--left">
                        Hello dude!
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 offset-lg-9 col-md-6 offset-md-6 offset-2 col-10">
                      <div class="ans-chat-bubble ans-chat-bubble--right">
                        Hello dude!
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 offset-lg-9 col-md-6 offset-md-6 offset-2 col-10">
                      <div class="ans-chat-bubble ans-chat-bubble--right">
                        Hello dude!
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 offset-lg-9 col-md-6 offset-md-6 offset-2 col-10">
                      <div class="ans-chat-bubble ans-chat-bubble--right">
                        Hello dude!
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 offset-lg-9 col-md-6 offset-md-6 offset-2 col-10">
                      <div class="ans-chat-bubble ans-chat-bubble--right">
                        Hello dude!
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-12">
                      <div class="ans-chat-box-tray">
                        <input type="ans-text" placeholder="Type your message here..." value="" class="ans-input-filed">
                        <i class="ans-material-icons fa fa-paper-plane ans-chat-send-btn"></i>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.0/sweetalert2.min.js"
        integrity="sha512-jJHgrGWRvOyyVt4TghrM7L+HSb02QkXJPPBJhDIkiqEzUYWBKe76GVVsZggmjZWOmsPwS0WSPIvyUGZzJta8kg=="
        crossorigin="anonymous"></script>
@endsection