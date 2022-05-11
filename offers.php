<?php
include 'services\connection.php';
include 'template\head.php';
$page = "offers";
include 'template\navbar.php';
?>

<div class="container mt-4">

    <table class="table table-striped">
    <thead class="bg-warning">
        <tr>
        <th scope="col">Makeup</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Bridal trial</td>
            <td class="text-left">£45</td>
        </tr>
        <tr>
            <td>Bridal</td>
            <td class="text-left">£60</td>
        </tr>
        <tr>
            <td>Daytime</td>
            <td class="text-left">£25</td>
        </tr>
        <tr>
            <td>Evening</td>
            <td class="text-left">£35</td>
        </tr>
        <tr>
            <td>Occasional</td>
            <td class="text-left">£35</td>
        </tr>
    </tbody>
    </table>

    <table class="table table-striped">
    <thead class="bg-warning">
        <tr>
        <th scope="col">Face painting</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Kids</td>
            <td class="text-left">(£10 - £20)</td>
        </tr>
        <tr>
            <td>Adults</td>
            <td class="text-left">(£30 - £40)</td>
        </tr>
    </tbody>
    </table>

    <table class="table table-striped">
    <thead class="bg-warning">
        <tr>
        <th scope="col">Semi - permament makeup</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>This service is coming soon. Will keep You updated.</td>
            <td></td>
        </tr>
    </tbody>
    </table>

    <table class="table table-striped">
    <thead class="bg-warning">
        <tr>
        <th scope="col">To make appointment</th>
        <th scope="col"></th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>You can make online appointment by <a class="text-warning" href="register.php">Sign in</a> on my website. <br>
            Please feel free to contact me for an appointment, consultation, further enquiries, prices and availability by my <a class="text-warning" href="contact.php">Contact</a> page.</td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
    </table>

</div>

<?php
include 'template\footer_scripts.php';
?>



<?php
include 'template\footer.php';
?>