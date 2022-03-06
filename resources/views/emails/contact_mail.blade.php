<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
  <div style="margin:50px auto;width:70%;padding:20px 0">
    <div style="border-bottom:1px solid #eee">
      <a href="" style="font-size:1.4em;color: #C32143;text-decoration:none;font-weight:600">TRINITY MATRIMONY</a>
    </div>
    <p style="font-size:1.1em">Dear Administrator!</p>
    <p>New enquiry received form Mr./Mrs {{$data['name']}}</p>
    <p>Email: <a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a></p>
    <p>Subject: {{$data['subject']}}</p>
    <p>Message:</p>
    <p>{{$data['message']}}</p>
    <h2 style="background: #C32143;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">{{session('reg_otp')}}</h2>
    <p style="font-size:0.9em;">Regards,<br />TRINITY MATRIMONY</p>
    <hr style="border:none;border-top:1px solid #eee" />
    <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
      <p>TRINITY MATRIMONY</p>
      <p>Trichy Rd, Palaniappa Nagar,</p>
      <p>Sowripalayam Pirivu, Ramanathapuram,</p>
      <p>Coimbatore, Tamil Nadu - 641045 </p>
    </div>
  </div>
</div>