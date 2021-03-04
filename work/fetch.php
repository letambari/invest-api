<?php

//fetch.php

$api_url = "http://localhost:8888/invest-api/api/test_api.php?action=fetch_all";

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);

$output = '';

if(count($result) > 0)
{
	foreach($result as $row)
	{
		$output .= '
		<tr>
			<td>'.$row->name.'</td>
			<td>'.$row->email.'</td>
			<td>'.$row->password.'</td>

			<td>'.$row->gender.'</td>
			<td>'.$row->phone.'</td>
			<td>'.$row->location.'</td>
			<td>'.$row->userID.'</td>
			
			<td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->userID.'">Edit</button></td>
			<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->userID.'">Delete</button></td>
		</tr>
		';
	}
}
else
{
	$output .= '
	<tr>
		<td colspan="4" align="center">No Data Found</td>
	</tr>
	';
}

echo $output;

?>