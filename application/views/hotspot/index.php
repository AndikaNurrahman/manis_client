
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="page-header">
                    <div class="page-title">
                        <h3>Hotspot </h3>
                    </div>

                </div>


                <!-- CONTENT AREA -->
   

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
               <th>Server</th>
               <th>Server</th>
    <th>User</th>
    <th>Address</th>
    <th>Mac Address</th>
    <th class="text-right">Uptime</th>
    <th class="text-right">Bytes In</th>
    <th class="text-right">Bytes Out</th>
    <th class="text-right">Time Left</th>
            </tr>
        </thead>
        <tbody>
 <?php
for ($i = 0; $i < $TotalReg; $i++) {
    $hotspotactive = $gethotspotactive[$i];
    $id = $hotspotactive['.id'];
    $server = $hotspotactive['server'];
    $user = $hotspotactive['user'];
    $address = $hotspotactive['address'];
    $mac = $hotspotactive['mac-address'];
     $uptime = formatDTM($hotspotactive['uptime']);
    
    $bytesi = formatBytes($hotspotactive['bytes-in'], 2);
    $byteso = formatBytes($hotspotactive['bytes-out'], 2);
    $loginby = $hotspotactive['login-by'];
    $uriprocess = "'remove-user-active=" . $id .  "'";
   
   echo "<tr>";
      echo "<td class='text-center'><li><a href='./?remove-user-active=".$id."' data-toggle='tooltip' data-placement='top' title='Delete'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill=;none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-x-octagon table-cance'><polygon points='7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2'></polygon><line x1='15' y1='9' x2='9' y2='15'></line><line x1='9' y1='9' x2='15' y2='15'></line></svg></a></li></td>";
    echo "<td><a  title='filter " . $server . "' href='./?hotspot=active&server=" . $server .  "'><i class='fa fa-server'></i> " . $server . "</a></td>";
    echo "<td><a title='Open User " . $user . "' href=./?hotspot-user=" . $user  . "><i class='fa fa-edit'></i> " . $user . "</a></td>";
    echo "<td>" . $address . "</td>";
    echo "<td>" . $mac . "</td>";
    echo "<td style='text-align:right;'>" . $uptime . "</td>";
    echo "<td style='text-align:right;'>" . $bytesi . "</td>";
    echo "<td style='text-align:right;'>" . $byteso . "</td>";
        echo "<td>" . $loginby . "</td>";
   echo "</tr>";
}
?>
        </tbody>
    </table>
</div>