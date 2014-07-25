@extends('layouts.master')

@section('content')


<h1>FLOK AMAZON AWS Instances</h1>

<h1>LINUX / PHP SERVERS</h1>
<hr />

<h3>Running Instances</h3>
<table border="1" cellpadding="5" cellspacing="0">
	<th>No.</th>
	<th>Tag Name</th>
	<th>State</th>					
	<th>Public DNS Name</th>
	<th>Elastic IP Associated</th>		
	<th>Intance Type</th>
<?php $j=1; foreach($ec2data2 as $reservations) { ?>
	<?php $instances = $reservations['Instances']; foreach($instances as $i) { ?>
	<?php if ($i['State']['Name'] == 'running') { ?>
		<tr>
		<td><?=$j?></td>
		<td><?=$i['Tags'][0]['Value']?></td>			
		<td><?=$i['State']['Name']?></td>			
		<td><?=$i['PublicDnsName']?></td>
		<td>
			<?php
				if (isset($i['NetworkInterfaces'][0]['Association']['PublicIp'])) {
					echo $i['NetworkInterfaces'][0]['Association']['PublicIp'];	
				}
			?>
		</td>		
		<td><?=$i['InstanceType']?></td>		
		</tr>
	<?php $j++; } ?>
	<?php } ?>
<?php  }  ?>
</table>

<br />

<h3>Stopped Instances</h3>
<table border="1" cellpadding="5" cellspacing="0">
	<th>No.</th>
	<th>Tag Name</th>
	<th>State</th>					
	<th>Public DNS Name</th>
	<th>Elastic IP Associated</th>	
	<th>Intance Type</th>	
<?php $j=1; foreach($ec2data2 as $reservations) { ?>
	<?php $instances = $reservations['Instances']; foreach($instances as $i) { ?>
	<?php if ($i['State']['Name'] == 'stopped') { ?>
		<tr>
		<td><?=$j?></td>
		<td><?=$i['Tags'][0]['Value']?></td>			
		<td><?=$i['State']['Name']?></td>			
		<td><?=$i['PublicDnsName']?></td>
		<td>
			<?php
				if (isset($i['NetworkInterfaces'][0]['Association']['PublicIp'])) {
					echo $i['NetworkInterfaces'][0]['Association']['PublicIp'];	
				}
			?>
		</td>		
		<td><?=$i['InstanceType']?></td>
		</tr>
	<?php $j++;} ?>
	<?php } ?>
<?php } ?>
</table>

<br /><br />
<b>Intance Details</b><br /><br />


<table border="1" cellpadding="5" cellspacing="0">
<th>Reservation Id</th>
<th>OwnerId</th>
<th>Instance Info</th>
<?php foreach($ec2data2 as $reservations) { ?>
<tr>
	<td><?=$reservations['ReservationId']?></td>
	<td><?=$reservations['OwnerId']?></td>
	<td>
		<table border="1" cellpadding="5" cellspacing="0">
			<th>Tag Name</th>
			<th>State</th>					
			<th>Public DNS Name</th>
			<th>Elastic IP Associated</th>		
			<th>Instance Id</th>
			<th>Image id</th>
			<th>Key Name</th>
			<th>Instance Type</th>
			<th>Availability Zone</th>
			<th>Monitoring</th>
			<th>Root Device Type</th>
			<th>Security Group</th>
			<?php $instances = $reservations['Instances']; foreach($instances as $i) { ?>
			<tr>
			<td><?=$i['Tags'][0]['Value']?></td>			
			<td><?=$i['State']['Name']?></td>			
			<td><?=$i['PublicDnsName']?></td>
			<td><?php
				if (isset($i['NetworkInterfaces'][0]['Association']['PublicIp'])) {
					echo $i['NetworkInterfaces'][0]['Association']['PublicIp'];	
				}
				
			?></td>		
			<td><?=$i['InstanceId']?></td>
			<td><?=$i['ImageId']?></td>
			<td><?=$i['KeyName']?></td>
			<td><?=$i['InstanceType']?></td>
			<td><?=$i['Placement']['AvailabilityZone']?></td>
			<td><?=$i['Monitoring']['State']?></td>
			<td><?=$i['RootDeviceType']?></td>
			<td><?=$i['SecurityGroups'][0]['GroupName']?></td>
			</tr>
			<?php } ?>
		</table>
	</td>
</tr>
<?php } ?>
</table>



<h1>WINDOWS / .NET SERVERS</h1>
<hr />

<h3>Running Instances</h3>
<table border="1" cellpadding="5" cellspacing="0">
	<th>No.</th>
	<th>Tag Name</th>
	<th>State</th>					
	<th>Public DNS Name</th>
	<th>Elastic IP Associated</th>		
	<th>Intance Type</th>
<?php $j=1; foreach($ec2data1 as $reservations) { ?>
	<?php $instances = $reservations['Instances']; foreach($instances as $i) { ?>
	<?php if ($i['State']['Name'] == 'running') { ?>
		<tr>
		<td><?=$j?></td>
		<td><?=$i['Tags'][0]['Value']?></td>			
		<td><?=$i['State']['Name']?></td>			
		<td><?=$i['PublicDnsName']?></td>
		<td>
			<?php
				if (isset($i['NetworkInterfaces'][0]['Association']['PublicIp'])) {
					echo $i['NetworkInterfaces'][0]['Association']['PublicIp'];	
				}
			?>
		</td>		
		<td><?=$i['InstanceType']?></td>		
		</tr>
	<?php $j++; } ?>
	<?php } ?>
<?php  }  ?>
</table>


<h3>Stopped Instances</h3>
<table border="1" cellpadding="5" cellspacing="0">
	<th>No.</th>
	<th>Tag Name</th>
	<th>State</th>					
	<th>Public DNS Name</th>
	<th>Elastic IP Associated</th>	
	<th>Intance Type</th>	
<?php $j=1; foreach($ec2data1 as $reservations) { ?>
	<?php $instances = $reservations['Instances']; foreach($instances as $i) { ?>
	<?php if ($i['State']['Name'] == 'stopped') { ?>
		<tr>
		<td><?=$j?></td>
		<td><?=$i['Tags'][0]['Value']?></td>			
		<td><?=$i['State']['Name']?></td>			
		<td><?=$i['PublicDnsName']?></td>
		<td>
			<?php
				if (isset($i['NetworkInterfaces'][0]['Association']['PublicIp'])) {
					echo $i['NetworkInterfaces'][0]['Association']['PublicIp'];	
				}
			?>
		</td>		
		<td><?=$i['InstanceType']?></td>
		</tr>
	<?php $j++;} ?>
	<?php } ?>
<?php } ?>
</table>

<br /><br />
<b>Intance Details</b><br /><br />


<table border="1" cellpadding="5" cellspacing="0">
<th>Reservation Id</th>
<th>OwnerId</th>
<th>Instance Info</th>
<?php foreach($ec2data1 as $reservations) { ?>
<tr>
	<td><?=$reservations['ReservationId']?></td>
	<td><?=$reservations['OwnerId']?></td>
	<td>
		<table border="1" cellpadding="5" cellspacing="0">
			<th>Tag Name</th>
			<th>State</th>					
			<th>Public DNS Name</th>
			<th>Elastic IP Associated</th>		
			<th>Instance Id</th>
			<th>Image id</th>
			<th>Key Name</th>
			<th>Instance Type</th>
			<th>Availability Zone</th>
			<th>Monitoring</th>
			<th>Root Device Type</th>
			<th>Security Group</th>
			<?php $instances = $reservations['Instances']; foreach($instances as $i) { ?>
			<tr>
			<td><?=$i['Tags'][0]['Value']?></td>			
			<td><?=$i['State']['Name']?></td>			
			<td><?=$i['PublicDnsName']?></td>
			<td><?php
				if (isset($i['NetworkInterfaces'][0]['Association']['PublicIp'])) {
					echo $i['NetworkInterfaces'][0]['Association']['PublicIp'];	
				}
				
			?></td>		
			<td><?=$i['InstanceId']?></td>
			<td><?=$i['ImageId']?></td>
			<td><?=$i['KeyName']?></td>
			<td><?=$i['InstanceType']?></td>
			<td><?=$i['Placement']['AvailabilityZone']?></td>
			<td><?=$i['Monitoring']['State']?></td>
			<td><?=$i['RootDeviceType']?></td>
			<td><?=$i['SecurityGroups'][0]['GroupName']?></td>
			</tr>
			<?php } ?>
		</table>
	</td>
</tr>
<?php } ?>
</table>



@stop

