<!--SIDEBAR &bb MAIN CONTENT PAGE-->

    <div id="main_sidebar" style="padding: 0px; margin: 0px !important" class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
        <div id="dashboard_sidebar">
            <ul class="sidebar_list">
                <li>
                    <i class="fa fa-inbox" aria-hidden="true"></i>
                    <a href="./Index.php">Home</a>
                    </li>
                <li onmouseover="dropdownClient()">
                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                    <a href="./Clients.php">Clients</a>
                    </li>
                    <!--CLIENT EXPENSE AND REVENUE-->
                    <div id="dropdown-hover-client" onmouseover="dropdownClient()" onmouseout="hideDropDownClient()">
                <!-- <li>
                    <i class="fa fa-envelope-open" aria-hidden="true"></i>
                    <a href="./ClientExpenses.php">Expenses</a>
                    </li>-->
                
                        <li> 
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            <a href="./ClientRevenue.php">Revenue</a>
                            </li>
                        <li>
                            <i class="fa fa-minus" aria-hidden="true"></i>
                            <a href="./ClientExpenses.php">Client Expenses</a>
                        </li>
                    </div>

                <li>
                    <i class="fa fa-eye" aria-hidden="true"></i>
                    <a href="./PendingRequest.php">Pending Requests</a>
                    </li>
                <li>
                    <i class="fa fa-envelope-open" aria-hidden="true"></i>
                    <a href="./Chat.php">Chat</a>
                    </li>
                
                <li>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <a href="./Schedule.php">Schedule</a>
                    </li>
                <li id="dropdown-parent"n  onmouseover="dropdown()">
                    <i class="fa fa-question" aria-hidden="true"></i>
                    <a href="./AccountSummary.php">Accounting</a>
                </li>
                <!--DROP DOWN-->
                <div id="dropdown-hover" onmouseover="dropdown()" onmouseout="hideDropDown()">
                <!-- <li>
                    <i class="fa fa-envelope-open" aria-hidden="true"></i>
                    <a href="./ClientExpenses.php">Expenses</a>
                    </li>-->
                
                <li> 
                    <i class="fa fa-file-archive" aria-hidden="true"></i>
                    <a href="./ClientInvoice.php">Invoice</a>
                    </li>
                <li>
                    <i class="fas fa-google-wallet" aria-hidden="true"></i>
                    <a href="./CompanyExpenses.php">Company Expenses</a>
                </li>
                </div>
            </ul>
        </div>    
    </div>


    <script>
    
    document.getElementById('dropdown-hover-client').style.display = 'block';
    
       function dropdown() {
           document.getElementById('dropdown-hover').style.opacity = '1';
           document.getElementById('dropdown-hover').style.display = 'block';
       }

       function hideDropDown() {
        document.getElementById('dropdown-hover').style.display = 'none';
        document.getElementById('dropdown-hover').style.opacity = '0';
       }

       function dropdownClient() {
           document.getElementById('dropdown-hover-client').style.opacity = '1';
           document.getElementById('dropdown-hover-client').style.display = 'block';
       }

       function hideDropDownClient() {
        document.getElementById('dropdown-hover-client').style.display = 'none';
        document.getElementById('dropdown-hover-client').style.opacity = '0';
       }
    </script>