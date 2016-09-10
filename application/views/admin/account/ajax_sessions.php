<table class="table table-striped table-hover session_data">
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
                </table>