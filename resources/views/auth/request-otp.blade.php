 @extends('layouts.app')
 @section('body')
     <body>
         @if (!old('phone_number'))
             <div class="container mt-5">
                 <div class="row justify-content-center">
                     <div class="col-md-8">
                         <div class="card">
                             <div class="card-header">Enter Phone Number</div>
                             <div class="card-body">
                                 <form method="POST" action="/request-otp">
                                     @csrf
                                     <div class="form-group">
                                         <label for="phone_number">Enter Phone Number</label>
                                         <input type="text" class="form-control" id="phone_number" name="phone_number"
                                             required>
                                     </div>
                                     <button type="submit" class="btn btn-primary mt-2">Next</button>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         @else
             <div class="container mt-5">
                 <div class="row justify-content-center">
                     <div class="col-md-8">
                         <div class="card">
                             <div class="card-header">Enter OTP</div>
                             <div class="card-body">
                                 <form method="POST" action="/verify-otp">
                                     @csrf
                                     <input type="hidden" name="phone_number" value="{{ old('phone_number') }}">
                                     <div class="form-group">
                                         <label for="otp">OTP</label>
                                         <input type="text" class="form-control" id="otp" name="otp" required>
                                     </div>
                                     <button type="submit" class="btn btn-primary mt-2">Next</button>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         @endif
     </body>
 @endsection
