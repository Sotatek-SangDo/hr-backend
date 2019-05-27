<h1>Information account</h1>
<p>First Name: {{ $information["firstname"] }}</p>
<p>Last Name: {{ $information["lastname"] }}</p>
<p>Phonenumber: {{ $information["phonenumber"] }}</p>
<p>Email: {{ $information["email"] }}</p>
<p>Password: {{ $information["password"] }}</p>

<p>Please login and change password to complete the registration process! Thank you!</p>
<p><a href="{{ env('FE_URL') }}">Go to site</a></p>
