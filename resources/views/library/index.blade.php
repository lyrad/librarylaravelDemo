<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script>
            $(document).ready(function() {
                $("form[name=library_create]").submit(function(event) {
                    $.ajax({
                        type: "POST",
                        url: "/api/library",
                        data: {
                            name: $('input[name=name]', this).val(),
                            addressHouseNumber: $('input[name=addressHouseNumber]', this).val(),
                            addressStreet: $('input[name=addressStreet]', this).val(),
                            addressPostalCode: $('input[name=addressPostalCode]', this).val(),
                            addressCity: $('input[name=addressCity]', this).val(),
                        },
                        dataType: "json",
                        encode: true,
                    }).done(function (data) {
                        console.log(data);
                    });

                    event.preventDefault();
                });
            });
        </script>
    </head>
    <body>
        <h1>Libraries</h1>
        <h2>Create</h2>
        <form name="library_create" method="POST">
            <label for="name">Name : </label><input type="text" name="name"><br>
            <label for="addressHouseNumber">Address house number : </label><input type="text" name="addressHouseNumber"><br>
            <label for="addressStreet">Address street : </label><input type="text" name="addressStreet"><br>
            <label for="addressPostalCode">Address postal code : </label><input type="text" name="addressPostalCode"><br>
            <label for="addressCity">Address city : </label><input type="text" name="addressCity"><br>
            <button>Create library</button>
        </form>
        <br>
        <h2>List</h2>
        @foreach ($libraries as $library)
            {{ $library->getId() }} - {{ $library->getName() }} - {{ $library->getAddressHouseNumber() }} {{ $library->getAddressStreet() }} {{ $library->getAddressPostalCode() }} {{ $library->getAddressCity() }} <br>
        @endforeach
    </body>
</html>



