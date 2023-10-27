<?php
include 'top.php';
?>

        <main>                                 
        
            <h2>Lab 6: Data Dictionary</h2>

            <h2>tblAccount</h2>
      
      <table class="pma-table print">
        <tr>
          <th>Column</th>
          <th>Type</th>
          <th>Null</th>
          <th>Default</th>
                      <th>Links to</th>
                    <th>Comments</th>
                  </tr>
                  <tr>
            <td class="nowrap">
              pmkAccountId
                              <em>(Primary)</em>
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              int
            </td>
            <td>No</td>
            <td class="nowrap">
                              
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
                  <tr>
            <td class="nowrap">
              fnkUserId
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              int
            </td>
            <td>No</td>
            <td class="nowrap">
                              0
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
                  <tr>
            <td class="nowrap">
              fldAccountName
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              varchar(25)
            </td>
            <td>No</td>
            <td class="nowrap">
                              0
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
                  <tr>
            <td class="nowrap">
              fldAccountAmount
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              int
            </td>
            <td>No</td>
            <td class="nowrap">
                              0
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
                  <tr>
            <td class="nowrap">
              fldAccountMonthlyDifference
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              int
            </td>
            <td>No</td>
            <td class="nowrap">
                              0
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
              </table>

              <h3>Indexes</h3>

        <div class="responsivetable jsresponsive">
          <table class="pma-table" id="table_index">
            <thead>
              <tr>
                <th>Keyname</th>
                <th>Type</th>
                <th>Unique</th>
                <th>Packed</th>
                <th>Column</th>
                <th>Cardinality</th>
                <th>Collation</th>
                <th>Null</th>
                <th>Comment</th>
              </tr>
            </thead>

            <tbody>
                                              <tr>
                  <td rowspan="1">PRIMARY</td>
                  <td rowspan="1">BTREE</td>
                  <td rowspan="1">Yes</td>
                  <td rowspan="1">No</td>

                                                          <td>
                      pmkAccountId
                                          </td>
                    <td>0</td>
                    <td>A</td>
                    <td>No</td>

                                          <td rowspan="1"></td>
                                    </tr>
                                            </tbody>
          </table>
        </div>
          </div>
      <div>
      <h2>tblAccountTransaction</h2>
      
      <table class="pma-table print">
        <tr>
          <th>Column</th>
          <th>Type</th>
          <th>Null</th>
          <th>Default</th>
                      <th>Links to</th>
                    <th>Comments</th>
                  </tr>
                  <tr>
            <td class="nowrap">
              fnkTransactionId
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              int
            </td>
            <td>No</td>
            <td class="nowrap">
                              0
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
                  <tr>
            <td class="nowrap">
              fnkAccountId
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              int
            </td>
            <td>No</td>
            <td class="nowrap">
                              0
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
              </table>

              <p>No index defined!</p>
          </div>
      <div>
      <h2>tblBudgetCategory</h2>
      
      <table class="pma-table print">
        <tr>
          <th>Column</th>
          <th>Type</th>
          <th>Null</th>
          <th>Default</th>
                      <th>Links to</th>
                    <th>Comments</th>
                  </tr>
                  <tr>
            <td class="nowrap">
              pmkGCategoryName
                              <em>(Primary)</em>
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              varchar(15)
            </td>
            <td>No</td>
            <td class="nowrap">
                              
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
                  <tr>
            <td class="nowrap">
              fldGCategoryAmount
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              int
            </td>
            <td>No</td>
            <td class="nowrap">
                              0
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
                  <tr>
            <td class="nowrap">
              fldGCategoryPercent
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              int
            </td>
            <td>No</td>
            <td class="nowrap">
                              0
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
              </table>

              <h3>Indexes</h3>

        <div class="responsivetable jsresponsive">
          <table class="pma-table" id="table_index">
            <thead>
              <tr>
                <th>Keyname</th>
                <th>Type</th>
                <th>Unique</th>
                <th>Packed</th>
                <th>Column</th>
                <th>Cardinality</th>
                <th>Collation</th>
                <th>Null</th>
                <th>Comment</th>
              </tr>
            </thead>

            <tbody>
                                              <tr>
                  <td rowspan="1">PRIMARY</td>
                  <td rowspan="1">BTREE</td>
                  <td rowspan="1">Yes</td>
                  <td rowspan="1">No</td>

                                                          <td>
                      pmkGCategoryName
                                          </td>
                    <td>0</td>
                    <td>A</td>
                    <td>No</td>

                                          <td rowspan="1"></td>
                                    </tr>
                                            </tbody>
          </table>
        </div>
          </div>
      <div>
      <h2>tblBudgetGoal</h2>
      
      <table class="pma-table print">
        <tr>
          <th>Column</th>
          <th>Type</th>
          <th>Null</th>
          <th>Default</th>
                      <th>Links to</th>
                    <th>Comments</th>
                  </tr>
                  <tr>
            <td class="nowrap">
              pmkBudgetGoalId
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              int
            </td>
            <td>No</td>
            <td class="nowrap">
                              0
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
                  <tr>
            <td class="nowrap">
              fldBGTotalAmount
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              int
            </td>
            <td>No</td>
            <td class="nowrap">
                              0
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
                  <tr>
            <td class="nowrap">
              fldBGTIncome
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              int
            </td>
            <td>No</td>
            <td class="nowrap">
                              0
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
              </table>

              <p>No index defined!</p>
          </div>
      <div>
      <h2>tblBudgetGoalBudgetCategory</h2>
      
      <table class="pma-table print">
        <tr>
          <th>Column</th>
          <th>Type</th>
          <th>Null</th>
          <th>Default</th>
                      <th>Links to</th>
                    <th>Comments</th>
                  </tr>
                  <tr>
            <td class="nowrap">
              fnkBudgetGoalId
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              int
            </td>
            <td>No</td>
            <td class="nowrap">
                              0
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
                  <tr>
            <td class="nowrap">
              fnkGCategoryName
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              varchar(15)
            </td>
            <td>No</td>
            <td class="nowrap">
                              0
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
              </table>

              <p>No index defined!</p>
          </div>
      <div>
      <h2>tblCategory</h2>
      
      <table class="pma-table print">
        <tr>
          <th>Column</th>
          <th>Type</th>
          <th>Null</th>
          <th>Default</th>
                      <th>Links to</th>
                    <th>Comments</th>
                  </tr>
                  <tr>
            <td class="nowrap">
              pmkCategoryName
                              <em>(Primary)</em>
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              varchar(15)
            </td>
            <td>No</td>
            <td class="nowrap">
                              
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
                  <tr>
            <td class="nowrap">
              fldCategoryAmount
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              int
            </td>
            <td>No</td>
            <td class="nowrap">
                              0
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
                  <tr>
            <td class="nowrap">
              fldCategoryPercent
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              int
            </td>
            <td>No</td>
            <td class="nowrap">
                              0
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
              </table>

              <h3>Indexes</h3>

        <div class="responsivetable jsresponsive">
          <table class="pma-table" id="table_index">
            <thead>
              <tr>
                <th>Keyname</th>
                <th>Type</th>
                <th>Unique</th>
                <th>Packed</th>
                <th>Column</th>
                <th>Cardinality</th>
                <th>Collation</th>
                <th>Null</th>
                <th>Comment</th>
              </tr>
            </thead>

            <tbody>
                                              <tr>
                  <td rowspan="1">PRIMARY</td>
                  <td rowspan="1">BTREE</td>
                  <td rowspan="1">Yes</td>
                  <td rowspan="1">No</td>

                                                          <td>
                      pmkCategoryName
                                          </td>
                    <td>0</td>
                    <td>A</td>
                    <td>No</td>

                                          <td rowspan="1"></td>
                                    </tr>
                                            </tbody>
          </table>
        </div>
          </div>
      <div>
      <h2>tblTransaction</h2>
      
      <table class="pma-table print">
        <tr>
          <th>Column</th>
          <th>Type</th>
          <th>Null</th>
          <th>Default</th>
                      <th>Links to</th>
                    <th>Comments</th>
                  </tr>
                  <tr>
            <td class="nowrap">
              pmkTransactionId
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              int
            </td>
            <td>No</td>
            <td class="nowrap">
                              0
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
                  <tr>
            <td class="nowrap">
              fldTransactionName
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              varchar(25)
            </td>
            <td>No</td>
            <td class="nowrap">
                              0
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
                  <tr>
            <td class="nowrap">
              fldTransactionAmount
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              int
            </td>
            <td>No</td>
            <td class="nowrap">
                              0
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
                  <tr>
            <td class="nowrap">
              fldTransactionDate
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              datetime
            </td>
            <td>No</td>
            <td class="nowrap">
                              2002-11-03 01:00:00
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
              </table>

              <p>No index defined!</p>
          </div>
      <div>
      <h2>tblTransactionCategory</h2>
      
      <table class="pma-table print">
        <tr>
          <th>Column</th>
          <th>Type</th>
          <th>Null</th>
          <th>Default</th>
                      <th>Links to</th>
                    <th>Comments</th>
                  </tr>
                  <tr>
            <td class="nowrap">
              pmkTransactionId
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              int
            </td>
            <td>No</td>
            <td class="nowrap">
                              0
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
                  <tr>
            <td class="nowrap">
              fnkCategoryName
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              varchar(15)
            </td>
            <td>No</td>
            <td class="nowrap">
                              0
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
              </table>

              <p>No index defined!</p>
          </div>
      <div>
      <h2>tblUser</h2>
      
      <table class="pma-table print">
        <tr>
          <th>Column</th>
          <th>Type</th>
          <th>Null</th>
          <th>Default</th>
                      <th>Links to</th>
                    <th>Comments</th>
                  </tr>
                  <tr>
            <td class="nowrap">
              pmkUserId
                              <em>(Primary)</em>
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              int
            </td>
            <td>No</td>
            <td class="nowrap">
                              
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
                  <tr>
            <td class="nowrap">
              fldUsername
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              varchar(25)
            </td>
            <td>No</td>
            <td class="nowrap">
                              0
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
                  <tr>
            <td class="nowrap">
              fldPassword
                          </td>
            <td lang="en" dir="ltr" class="nowrap">
              varchar(35)
            </td>
            <td>No</td>
            <td class="nowrap">
                              0
                          </td>
                          <td></td>
                        <td></td>
                      </tr>
              </table>

              <h3>Indexes</h3>

        <div class="responsivetable jsresponsive">
          <table class="pma-table" id="table_index">
            <thead>
              <tr>
                <th>Keyname</th>
                <th>Type</th>
                <th>Unique</th>
                <th>Packed</th>
                <th>Column</th>
                <th>Cardinality</th>
                <th>Collation</th>
                <th>Null</th>
                <th>Comment</th>
              </tr>
            </thead>

            <tbody>
                                              <tr>
                  <td rowspan="1">PRIMARY</td>
                  <td rowspan="1">BTREE</td>
                  <td rowspan="1">Yes</td>
                  <td rowspan="1">No</td>

                                                          <td>
                      pmkUserId
                                          </td>
                    <td>0</td>
                    <td>A</td>
                    <td>No</td>

                                          <td rowspan="1"></td>
                                    </tr>
                                            </tbody>
          </table>
        
        
        
        </main>
    
    <?php include 'footer.php';?>    

    </body>
</html>
    