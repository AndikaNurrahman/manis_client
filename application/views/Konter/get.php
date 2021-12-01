         <div class="form-group">

             <select name="code" class="selectpicker form-control">
                 <?php $results = json_decode(harga('pulsa'), true);   ?>
                 <?php for ($i = 0; $i < count($results['message']); $i++) { ?>
                     <?php if ($results['message'][$i]['provider'] != $key) {
                            continue;
                        } ?>
                     <option value="<?= $results['message'][$i]['code']; ?>|<?= $results['message'][$i]['price'] + 1105; ?>|<?= $results['message'][$i]['description']; ?>"><?= $results['message'][$i]['description']; ?></option>
                 <?php } ?>
             </select>


             <?php $i++ ?>
         </div>
         <button type="submit" class="btn btn-primary btn-block mb-4 mr-2">Beli</button>

         </div>
         </div>
         </div>
         <div class="table-responsive">
             <table class="table table-bordered table-striped mb-4">
                 <thead>
                     <tr>
                         <th>Name</th>
                         <th>Date</th>
                         <th>Sale</th>


                     </tr>
                 </thead>
                 <tbody>

                     <?php $result = json_decode(harga('pulsa'), true);   ?>
                     <?php for ($i = 0; $i < count($result['message']); $i++) { ?>
                         <?php if ($result['message'][$i]['provider'] != $key) {
                                continue;
                            } ?>
                         <?php $harga = $result['message'][$i]['price'] + 1105; ?>
                         <tr>



                             <td>
                                 <div class="d-flex">
                                     <div class="usr-img-frame mr-2 rounded-circle">
                                         <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg">
                                     </div>
                                     <p class="align-self-center mb-0"><?= $result['message'][$i]['operator']; ?></p>
                                 </div>
                             </td>
                             <td><?= $result['message'][$i]['description']; ?></td>
                             <td>RP. <?php echo number_format($harga, 2, ',', '.'); ?></td>

                         </tr>
                     <?php } ?>
                     <?php $i++ ?>
                 </tbody>
             </table>