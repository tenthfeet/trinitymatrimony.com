@extends('layouts.app')

@section('content')
<div class="grid_3">
    <div class="container">
        <div class="breadcrumb1">
            <ul>
                <a href="{{url('/')}}"><i class="fa fa-home home_1"></i></a>
                <span class="divider">&nbsp;|&nbsp;</span>
                <li class="current-page">Contact</li>
            </ul>
        </div>
        <div class="grid_5">
            <p>some content</p>
            <address class="addr row">
                <dl class="grid_4">
                    <dt>Address :</dt>
                    <dd>
                        TRINITY MATRIMONY <br>
                        Holy Trinity Cathedral, Ramanathapuram, <br>
                        Coimbatore. Tamilnadu, India.
                        <br>

                    </dd>
                </dl>
                <dl class="grid_4">
                    <dt>Telephones :</dt>
                    <dd>
                        +91 422 2222 222222 <br>
                        +91 422 2222 222222
                    </dd>
                </dl>
                <dl class="grid_4">
                    <dt>E-mail :</dt>
                    <dd><a href="malito:mail@trinitymatrimony.com">mail(at)mail@trinitymatrimony.com</a></dd>
                </dl>
            </address>
        </div>
    </div>
</div>
<div class="about_middle">
    <div class="container">
        <h2>Contact Form</h2>
        <form id="contact-form" class="contact-form">
            <fieldset>
                <input type="text" class="text" placeholder="" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
                <input type="text" class="text" placeholder="" value="Phone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}">
                <input type="text" class="text" placeholder="" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
                <textarea value="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
                <input name="submit" type="submit" id="submit" value="Submit">
            </fieldset>
        </form>
    </div>
</div>
@endsection