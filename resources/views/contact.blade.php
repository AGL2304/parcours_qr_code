<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
</head>
<body>
    <h1>Page de contact</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ url('contact') }}">
        @csrf
        <label>Nom :</label><br>
        <input type="text" name="nom"><br>

        <label>Email :</label><br>
        <input type="email" name="email"><br>

        <label>Message :</label><br>
        <textarea name="message"></textarea><br>

        <button type="submit">Envoyer</button>
    </form>
</body>
</html>
