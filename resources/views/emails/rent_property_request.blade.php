<h2>New Rent Property Request</h2>
<p>A new rent property request has been submitted from the website.</p>

<table cellpadding="8" cellspacing="0" border="1" style="border-collapse: collapse; width: 100%; max-width: 720px;">
    <tr>
        <td><strong>Name</strong></td>
        <td>{{ $data['name_english'] ?? '' }}</td>
    </tr>
    <tr>
        <td><strong>Email</strong></td>
        <td>{{ $data['email'] ?? '' }}</td>
    </tr>
    <tr>
        <td><strong>Phone</strong></td>
        <td>{{ $data['phone'] ?? '' }}</td>
    </tr>
    <tr>
        <td><strong>Property Title</strong></td>
        <td>{{ $data['property_title'] ?? '' }}</td>
    </tr>
    <tr>
        <td><strong>Property Type</strong></td>
        <td>{{ $data['property_type'] ?? '' }}</td>
    </tr>
    <tr>
        <td><strong>Monthly Rent</strong></td>
        <td>{{ $data['monthly_rent'] ?? '' }}</td>
    </tr>
    <tr>
        <td><strong>Location</strong></td>
        <td>{{ $data['location'] ?? '' }}</td>
    </tr>
    <tr>
        <td><strong>Area Size</strong></td>
        <td>{{ $data['area_size'] ?? '' }}</td>
    </tr>
    <tr>
        <td><strong>Bedrooms</strong></td>
        <td>{{ $data['bedrooms'] ?? '' }}</td>
    </tr>
    <tr>
        <td><strong>Bathrooms</strong></td>
        <td>{{ $data['bathrooms'] ?? '' }}</td>
    </tr>
    <tr>
        <td><strong>Available From</strong></td>
        <td>{{ $data['available_from'] ?? '' }}</td>
    </tr>
    <tr>
        <td><strong>Full Address</strong></td>
        <td>{{ $data['full_address'] ?? '' }}</td>
    </tr>
    <tr>
        <td><strong>Description</strong></td>
        <td>{{ $data['description'] ?? '' }}</td>
    </tr>
</table>
