Dear, <strong> {{ $name }} </strong>
<p>Please click on the link to verify your email address {{ HTML::linkRoute('verify-my-email', 'verify my email now', $hash) }}</p>