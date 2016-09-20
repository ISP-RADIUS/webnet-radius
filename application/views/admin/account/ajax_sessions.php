<table class="table table-striped table-hover session_data small">
    <thead>
        <tr>
            <th>Date</th>
            <th>Upload</th>
            <th>Download</th>
          
        </tr>
    </thead>
    <tbody>
        <?php
           
            foreach ($sessions as $session) :
        ?>
        <tr>
            <td><?php echo $session->date; ?></td>
            <td> <?php echo $session->upload; ?></td>    
            <td><?php echo $session->download; ?></td>
            
        </tr>
        
        <?php
          
            endforeach;
        ?>

    </tbody>
    <tr>
        <th></th>
        <th>Total Upload : <?php echo $totalUpload; ?> </th>
        <th>Total Download : <?php echo $totalDownload; ?> </th>
    </tr>
</table>