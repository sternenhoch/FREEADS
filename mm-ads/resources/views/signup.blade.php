<x-header_footer>
 
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
    <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
        <form action="/register" method="POST" id="registration-form">
          @csrf
          <div class="form-group">
            <label for="login" class="text-muted mb-1"><small>Login</small></label>
            <input name="login" value="{{old('login')}}" id="login" class="form-control" type="text" placeholder="Pick a login" autocomplete="off" />
            @error('login')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="email" class="text-muted mb-1"><small>Email</small></label>
            <input name="email" id="email" value="{{old('email')}}" class="form-control" type="text" placeholder="you@example.com" autocomplete="off" required />
          @error('email')
          <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
          @enderror
          </div>

          <div class="form-group">
            <label for="password" class="text-muted mb-1"><small>Password</small></label>
            <input name="password" id="password" class="form-control" type="password" placeholder="Create a password" required />
            @error('password')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="password_confirmation" class="text-muted mb-1"><small>Confirm Password</small></label>
            <input name="password_confirmation" id="password_confirmation" class="form-control" type="password" placeholder="Confirm password" required/>
            @error('password_confirmation')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
          </div>

          <div class="form-group" class="text-muted mb-1">
            <label for="phone_number"><small>Phone number</small></label>
            <input name="phone_number" type="tel" id="phone_number" class="form-control">
            </div>

          <button type="submit" class="py-3 mt-4 btn btn-success btn-block">Create your account</button>
        </form>
      </div>

</x-header_footer>