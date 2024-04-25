<link href="http://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<main class="signup-form">
    <div class="cotainer mt-4">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Register User</h3>
                    <div class="card-body">

                        <form action="{{ route('register.custom') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="FULL Name" id="name" class="form-control" name="name"
                                       required autofocus>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email_address" class="form-control"
                                       name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control"
                                       name="password" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Confirmed Password" id="confirm_password"
                                       class="form-control" name="confirm_password" required/>
                            </div>
                            <div class="form-group mb-3">
                                <input class="datepicker form-control" type="date" placeholder="Select Date Of Birth"
                                name="date_of_birth"/>
                            </div>
                            <div class="form-group mb-3">
                                    <select name="gender" class="form-control">
        <option value="">Please select gender</option>
        <option value="female">Female</option>
        <option value="male">Male</option>
        <option value="non-binary">Non-Binary</option>
        <option value="other">Other</option>
        <option value="Prefer not to answer">Perfer not to Answer</option>
    </select>
</div>
                            <div class="form-group mb-3">
                            <select id="country" name="country" class="form-control">
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group mb-3">
                            <select id="state" name="state" class="form-control">
                                <option value="">Select State</option>
                            </select>
                            </div>
                            <div class="form-group mb-3">
                            <select id="city" name="city" class="form-control">
                                <option value="">Select City</option>
                            </select>
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember"> Remember Me</label>
                                </div>
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Sign up</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function() {
        $('#country').change(function(){
            var countryId = $(this).val();
alert(countryId);
            $.ajax({
                url : 'api/states/' + countryId,
                type : 'GET',
                success: function(data){
                    console.log(data);
                    $('#state').empty();
                    $('#state').append('<option value="">select states</option>');
                    $.each(data, function(key, value){

                        $('#state').append('<option value="'+ value.id +'">'+
                            value.name
                        +'</option>');
                    });
                }
            });
        });

        $('#state').change(function(){
            var stateId = $(this).val();

            $.ajax({
                url : 'api/cities/' + stateId,
                type : 'GET',
                success: function(data){
                    $('#city').empty();
                    $('#city').append('<option value="">select city</option>');
                    $.each(data, function(key, value){
                        $('#city').append('<option value="'+ value.id+'">'+ value
                            .name +'</option>');
                    });
                }
            });
        });
    });
</script>
