<div class="table-responsive ">
                                    <table class="table">
                                            
                                            <thead>
                                                <tr>
                                                    <th scope="col">Donated by</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Best Before date</th>
                                                    <th scope="col">Uploaded Image</th>
                                                    <th scope="col">Pickup Location</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Select</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                            <?php
                                            
                                            $sql = "SELECT * FROM donations WHERE delivery_status=0 ";
                                            $sql_query = mysqli_query($con, $sql);
                                            while ($row = mysqli_fetch_assoc($sql_query)) {
                                                $username = $row['username'];
                                                $title = $row['title'];
                                                $description = $row['description'];
                                                $best_before = $row['best_before'];
                                                $img_path = $row['image'];
                                                $pickup = $row['pickup'];
                                                $status = $row['status'];
                                                $id = $row['id'];

                                                
                                                echo '<tr>';
                                                echo'<td><a href="viewprofile.php?username='.$username.'" style="pointer:cursor;">'.$username.'</a></td> ';
                                                echo'<td>'.$title. '</td> ';
                                                echo'<td style="width:400px;">'.$description. '</td> ';
                                                echo'<td>'.$best_before. '</td> ';
                                                echo'<td><a href="../donor/donation_img/'.$img_path.'">View Image</a></td> ';
                                                echo'<td>'.$pickup. '</td> ';
                                                
                                                $value = "bg-danger";
                                                $text = "Expired";
                                                if($status==0)
                                                {
                                                    $value = "bg-info";
                                                    $text="Pending";
                                                }
                                                else if($status==1)
                                                {
                                                    $value = "bg-warning";
                                                    $text = "Accepted";

                                                }
                                                else if($status==2)
                                                {
                                                    $value = "bg-success";
                                                    $text="Received";
                                                }
                                                
                                                echo '<td><span class="badge '.$value.' text-white">'.$text.'</span></td>';
                                                     
                                                    if ($status==0)
                                                    {
                                                        echo '<td style="text-align:center;"><a href="donation_accepted.php?id='.$id.'" style="cursor:pointer; border:0px; background:none;"><i class="fa-solid fa-clipboard-check text-danger" style=" font-size:24px;"></i></a></td>';

                                                    } 
                                                    else
                                                    {
                                                        echo '<td style="text-align:center;"><i class="fa-solid fa-clipboard-check text-success" style=" font-size:24px;"></i></td>';
                                                    }
                                                 echo '</tr> ';

                                            }
                                            ?>
                                                <!-- <tr>
                                                    <td>Oct 12, 2022</td>
                                                    <td>Oct 14,2022</td>
                                                    <td>-</td>
                                                    <td>Kalimati</td>
                                                    <td>
                                                        <img src="../assets/images/1.png" width="50">
                                                        <img src="../assets/images/1.png" width="50">
                                                        <img src="../assets/images/1.png" width="50">
                                                    </td>
                                                    <td><span class="badge bg-info text-white">pending</span></td>
                                                    <td class="align-right">
                                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                          <i class="fa fa-edit"></i>
                                                        </a> |
                                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                          <i class="fa fa-trash-alt"></i>
                                                        </a>
                                                      </td>
                                                </tr>
                                                <tr>
                                                    <td>Oct 23, 2022</td>
                                                    <td>Oct 26,2022</td>
                                                    <td>-</td>
                                                    <td>Maitidevi</td>
                                                    <td>
                                                        <img src="../assets/images/1.png" width="50">
                                                        <img src="../assets/images/1.png" width="50">
                                                    </td>
                                                    <td><span class="badge bg-success text-white">received</span></td>
                                                    <td class="align-right">
                                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                          <i class="fa fa-edit"></i>
                                                        </a> |
                                                        <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                          <i class="fa fa-trash-alt"></i>
                                                        </a>
                                                      </td>
                                                </tr> -->
                                            </tbody>
                                            
                                            
                                        </table>
                                    </div>






                                    <a href="../donor/donation_img/'.$img_path.'" class="bg-image hover-zoom"><img class=" card-img-top hover-zoom" src="../donor/donation_img/'.$img_path.'" alt="Card image cap" style="hover:">
                                   
                                   </a>
                                    
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">Cras justo odio</li>
                                                    <li class="list-group-item">Dapibus ac facilisis in</li>
                                                    <li class="list-group-item">Vestibulum at eros</li>
                                                </ul>
                                                <div class="card-body">
                                                    <a href="#" class="card-link">Card link</a>
                                                    <a href="#" class="card-link">Another link</a>
                                                </div> 
                                            </div>