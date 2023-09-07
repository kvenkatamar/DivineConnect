  
<div class="card">
            <div class="section-block" id="language">
    <div class="card-header">
        <h5 class="mb-0 h6">Country</h5>
    </div>

  <form action="app/implode_crud.php" method="POST">

   <div class="col-md-6">
                  
                    <select class="form-control aiz-selectpicker" name="country" data-live-search="true" multiple="multiple" size="5" value="<?php echo $res['country']; ?>">
                      <option value=""> </option>
                       <option value="India"  > India</option>
                                                    <option value="USA" > USA</option>
                                                    <option value="Russia" > Russia </option>
                                                    <option value="France" > France </option>
                                                    <option value="London"  > London </option>
                                                    <option value="Banglore"> Banglore </option>
                                                    <option value="Pakistan"> Pakistan </option>
                                                    <option value="China"> China </option>
                                                    <option value="Iran" > Iran </option>
                                                    <option value="Spain"> Spain </option>
                                            </select>
                                    </div>
                      <div class="text-right">
                <button type="submit" name="submit" class="btn btn-primary btn-sm" style="width:25%;">Submit</button>
            </div>             

                 </form>
               </div>
             </div>
             