<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script>
            $(document).ready(function() {
                // Address ajax search and display results.
                $("form[name=library_create] input[name=addressSearch]").on('input', function() {
                    if ($(this).val().length > 3) {
                        $.ajax({
                            url: "/api/address/search/" + $(this).val(),
                        }).done(function (data) {
                            $("form[name=library_create] select[name=addressSearchResult]")
                                .find('option')
                                .remove()
                                .end()
                            ;

                            data.forEach(
                                address => $("form[name=library_create] select[name=addressSearchResult]").append(
                                    new Option(
                                        address.housenumber + ' ' + address.street + ' ' + address.postcode + ' ' + address.city,
                                        address.housenumber + '##' + address.street + '##' + address.postcode + '##' + address.city,
                                    )
                            ));
                        });
                    }
                });

                // Address search result selection.
                $("form[name=library_create] select[name=addressSearchResult]").change(function() {
                    var address = $(this).val()[0].split('##');
                    $("form[name=library_create] input[name=addressHouseNumber]").val(address[0]);
                    $("form[name=library_create] input[name=addressStreet]").val(address[1]);
                    $("form[name=library_create] input[name=addressPostalCode]").val(address[2]);
                    $("form[name=library_create] input[name=addressCity]").val(address[3]);
                });

                // Address create ajax submit.
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
                        $('#libraryTable').append('<tr><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.addressHouseNumber + ' ' + data.addressStreet + ' ' + data.addressPostalCode + ' ' + data.addressCity + '</td>');
                        $("form[name=library_create] input[name=name]").val('');
                        $("form[name=library_create] input[name=addressSearch]").val('');
                        $("form[name=library_create] input[name=addressHouseNumber]").val('');
                        $("form[name=library_create] input[name=addressStreet]").val('');
                        $("form[name=library_create] input[name=addressPostalCode]").val('');
                        $("form[name=library_create] input[name=addressCity]").val('');
                        $("form[name=library_create] select[name=addressSearchResult]")
                            .find('option')
                            .remove()
                            .end()
                        ;

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
            <label for="name">Name : </label><input type="text" name="name"><br><br>

            <label for="addressSearch">Address search : </label><input type="text" name="addressSearch"><br>
            <select name="addressSearchResult" multiple="true"></select><br><br>

            <label for="addressHouseNumber">Address house number : </label><input type="text" name="addressHouseNumber"><br>
            <label for="addressStreet">Address street : </label><input type="text" name="addressStreet"><br>
            <label for="addressPostalCode">Address postal code : </label><input type="text" name="addressPostalCode"><br>
            <label for="addressCity">Address city : </label><input type="text" name="addressCity"><br>
            <button>Create library</button>
        </form>
        <br>
        <h2>List</h2>
        <table id="libraryTable">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
            </tr>
            @foreach ($libraries as $library)
                <tr>
                    <td>{{ $library->getId() }}</td>
                    <td>{{ $library->getName() }}</td>
                    <td>{{ $library->getAddressHouseNumber() }} {{ $library->getAddressStreet() }} {{ $library->getAddressPostalCode() }} {{ $library->getAddressCity() }}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>



