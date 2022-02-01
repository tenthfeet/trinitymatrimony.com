@extends('layouts.app')

@section('content')
<div class="grid_3">
    <div class="container">
     <div class="breadcrumb1">
       <ul>
          <a href="index.html"><i class="fa fa-home home_1"></i></a>
          <span class="divider">&nbsp;|&nbsp;</span>
          <li class="current-page">View Profile</li>
       </ul>
     </div>
     <div class="profile">
          <div class="col-md-8 profile_left">
              <h2>Id : {{$data->pid}}</h2>
              <div class="col_3">
                 <div class="col-sm-4  text-center">
                    <img class="rounded" style="width:200px;height:200px;" src="{{asset($data->photo)}}" />
              </div>
              <div class="col-sm-8 row_1">
                  <table class="table_working_hours">
                      <tbody>
                          <tr class="opened_1">
                              <td class="day_label">Age / Height :</td>
                              <td class="day_value">28, 5ft 5in / 163cm</td>
                          </tr>
                          <tr class="opened">
                              <td class="day_label">Last Login :</td>
                              <td class="day_value">4 hours ago</td>
                          </tr>
  
                          <tr class="opened">
                              <td class="day_label">Marital Status :</td>
                              <td class="day_value">Single</td>
                          </tr>
                          <tr class="opened">
                              <td class="day_label">Location :</td>
                              <td class="day_value">Coimbatore</td>
                          </tr>
                          <tr class="closed">
                              <td class="day_label">Profile Created by :</td>
                              <td class="day_value closed"><span>Self</span></td>
                          </tr>
                          <tr class="closed">
                              <td class="day_label">Education :</td>
                              <td class="day_value closed"><span>Medicine</span></td>
                          </tr>
                      </tbody>
                  </table>
                  <ul class="login_details">
                    <li><a href="{{url('/updateprofile')}}">Update profile</a></li>
                  </ul>
              </div>
              <div class="clearfix"> </div>
          </div>
          <div class="col_4">
              <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                 <ul id="myTab" class="nav nav-tabs nav-tabs1" role="tablist">
                    <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">About Myself</a></li>
                    <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Family Details</a></li>
                    <li role="presentation"><a href="#profile1" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile1">Partner Preference</a></li>
                 </ul>
                 <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                      <div class="tab_box">
                          <h1>I am a 26 year old 5`5`` tall, slim woman, . I have MBBS degree . I love reading books and co0llecting the antiques.</h1>
                          <p>I am a 26 year old 5`5`` tall, slim woman, . I have MBBS degree . I love reading books and co0llecting the antiques.</p>
                      </div>
                      <div class="basic_1">
                          <h3>Basics </h3>
                          <div class="col-md-6 basic_1-left">
                            <table class="table_working_hours">
                              <tbody>
                                  <tr class="opened_1">
                                      <td class="day_label">Name :</td>
                                      <td class="day_value">Bride</td>
                                  </tr>
  
                                  <tr class="opened">
                                      <td class="day_label">Height :</td>
                                      <td class="day_value">28, 5ft 5in / 163cm</td>
                                  </tr>
                                  
                                  <tr class="opened">
                                      <td class="day_label">Profile Created by :</td>
                                      <td class="day_value closed"><span>Self</span></td>
                                  </tr>
                                  <tr class="opened">
                                      <td class="day_label">Weight:</td>
                                      <td class="day_value closed"><span>52</span></td>
                                  </tr>
                              </tbody>
                            </table>
                           </div>
                           <div class="col-md-6 basic_1-left">
                            <table class="table_working_hours">
                              <tbody>
                                  <tr class="opened_1">
                                      <td class="day_label">Age :</td>
                                      <td class="day_value">28 Yrs</td>
                                  </tr>
                                  <tr class="opened">
                                      <td class="day_label">Complexion :</td>
                                      <td class="day_value">Fair</td>
                                  </tr>
                                  <tr class="opened">
                                      <td class="day_label">Weight :</td>
                                      <td class="day_value">45</td>
                                  </tr>
                                  <tr class="closed">
                                      <td class="day_label">Church :</td>
                                      <td class="day_value closed"><span>church</span></td>
                                  </tr>
  
                              </tbody>
                          </table>
                          </div>
                          <div class="clearfix"> </div>
                      </div>
                      <div class="basic_1">
                          <h3>Family</h3>
                          <div class="col-md-6 basic_1-left">
                            <table class="table_working_hours">
                              <tbody>
                                  <tr class="opened">
                                      <td class="day_label">Date of Birth :</td>
                                      <td class="day_value closed"><span>01-05-1988</span></td>
                                  </tr>
                                  <tr class="opened">
                                      <td class="day_label">Place of Birth :</td>
                                      <td class="day_value closed"><span>Coimbatore</span></td>
                                  </tr>
                               </tbody>
                            </table>
                           </div>
                           <div class="col-md-6 basic_1-left">
                            <table class="table_working_hours">
                              <tbody>
  
                                  
                              </tbody>
                          </table>
                          </div>
                          <div class="clearfix"> </div>
                      </div>
                      <div class="basic_1 basic_2">
                          <h3>Education & Career</h3>
                          <div class="basic_1-left">
                            <table class="table_working_hours">
                              <tbody>
                                  <tr class="opened">
                                      <td class="day_label">Education   :</td>
                                      <td class="day_value">Medicine</td>
                                  </tr>
                                  <tr class="opened">
                                      <td class="day_label">Education Detail :</td>
                                      <td class="day_value">Software Engineer</td>
                                  </tr>
                                  
                                  <tr class="opened">
                                      <td class="day_label">Annual Income :</td>
                                      <td class="day_value closed"><span>Rs.10,00,000 - 15,00,000</span></td>
                                  </tr>
                               </tbody>
                            </table>
                           </div>
                           <div class="clearfix"> </div>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                      <div class="basic_3">
                          <h4>Family Details</h4>
                          <div class="basic_1 basic_2">
                          <h3>Basics</h3>
                          <div class="col-md-6 basic_1-left">
                            <table class="table_working_hours">
                              <tbody>
                                  <tr class="opened">
                                      <td class="day_label">Father's Occupation :</td>
                                      <td class="day_value">Not Specified</td>
                                  </tr>
                                  <tr class="opened">
                                      <td class="day_label">Mother's Occupation :</td>
                                      <td class="day_value">Not Specified</td>
                                  </tr>
                                  <tr class="opened">
                                      <td class="day_label">No. of Brothers :</td>
                                      <td class="day_value closed"><span>Not Specified</span></td>
                                  </tr>
                                  <tr class="opened">
                                      <td class="day_label">No. of Sisters :</td>
                                      <td class="day_value closed"><span>Not Specified</span></td>
                                  </tr>
                               </tbody>
                            </table>
                           </div>
                         </div>
                      </div>
                   </div>
                   <div role="tabpanel" class="tab-pane fade" id="profile1" aria-labelledby="profile-tab1">
                      <div class="basic_1 basic_2">
                         <div class="basic_1-left">
                                                     <table class="table_working_hours">
                              <tbody>
                                  <tr class="opened">
                                      <td class="day_label">Father's Occupation :</td>
                                      <td class="day_value">Not Specified</td>
                                  </tr>
                                  <tr class="opened">
                                      <td class="day_label">Mother's Occupation :</td>
                                      <td class="day_value">Not Specified</td>
                                  </tr>
                                  <tr class="opened">
                                      <td class="day_label">No. of Brothers :</td>
                                      <td class="day_value closed"><span>Not Specified</span></td>
                                  </tr>
                                  <tr class="opened">
                                      <td class="day_label">No. of Sisters :</td>
                                      <td class="day_value closed"><span>Not Specified</span></td>
                                  </tr>
                               </tbody>
                            </table>
                          </div>
                       </div>
                   </div>
               </div>
            </div>
         </div>
          </div>
       <div class="col-md-4 profile_right">
           <div class="newsletter">
             <form>
                <input type="text" name="ne" size="30" required="" placeholder="Enter Profile ID :">
                <input type="submit" value="Go">
             </form>
          </div>
          <div class="view_profile">
              <h3>View Similar Profiles</h3>
  
  
  
  
         </div>
         <div class="view_profile view_profile1">
              <h3>Members who viewed this profile also viewed</h3>
  
           </div>
          </div>
         <div class="clearfix"> </div>
      </div>
    </div>
  </div>
@endsection