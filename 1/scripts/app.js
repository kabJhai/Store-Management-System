/**
 * Created by kabil on 7/13/2018.
 */
/**Function for Dropdown*/
var toggle_members = 0;
var toggle_admins = 0;
var alreadyClicked = 0;
function displayMenu(type){
    var members_dropdown = document.getElementById("members_dropdown");
    var admins_dropdown = document.getElementById("admins_dropdown");
    var under_members = document.getElementById("under_members");
    var under_admins = document.getElementById("under_admins");
    if(type == "members"){
        if(toggle_members == 0){
            members_dropdown.style = "display:block";
            under_members.style = "margin-top: 20%";
            members_dropdown.setAttribute("class","animated tada");
            toggle_members = 1;
            if(toggle_admins == 1){
                admins_dropdown.style = "margin-top:24%;display:block";
            }
        }else{
            members_dropdown.style = "display:none";
            under_members.style = "margin-top: 0";
            members_dropdown.setAttribute("class"," ");
            toggle_members = 0;
            if(toggle_admins == 1){
                admins_dropdown.style = "margin-top:19%;display:block";
            }
        }

    }else if(type == "admins"){
        if(toggle_admins == 0){
            under_admins.style = "margin-top: 20%";
            admins_dropdown.style = "display:block";
            admins_dropdown.setAttribute("class","animated tada");
            toggle_admins = 1;
            if(toggle_members == 1){
                admins_dropdown.style = "margin-top:24%;display:block";
            }
        }else{
            admins_dropdown.style = "display:none";
            under_admins.style = "margin-top: 0";
            admins_dropdown.setAttribute("class"," ");
            toggle_admins = 0;
        }
    }
}
function changeStyle(selected){
    var phoneInput = document.getElementById("phone");
    var passwordInput = document.getElementById("password");
    if(selected == 0) {
        phoneInput.style = "border-style:none;border-bottom-style:solid;border-color:#0B0F2E;";
        passwordInput.style = "border-style:solid;border-color:#e3e3e3;";
        if(alreadyClicked == 1){
            if(passwordInput.value == ""){
                phoneInput.style = "color:red;";
                passwordInput.style = "border-style:solid;border-color:#e3e3e3;color:red;";
                passwordInput.setAttribute("placeholder","Password must be inserted");
            }else{
                passwordInput.style = "color:#e3e3e3;";
            }
        }
        alreadyClicked = 1;
    }else if (selected == 1){
        passwordInput.style = "border-style:none;border-bottom-style:solid;border-color:#0B0F2E;";
        phoneInput.style = "border-style:solid;border-color:#e3e3e3;";
        if(alreadyClicked == 1){
            if(phoneInput.value == ""){
                passwordInput.style = "color:red;";
                phoneInput.style = "border-style:solid;border-color:#e3e3e3;color:red;";
                phoneInput.setAttribute("placeholder","First name must be inserted");
            }
        }else{
            phoneInput.style = "color:#e3e3e3;";
        }
        alreadyClicked = 1;
    }
}
function listenPhone() {
    var phone = document.getElementById('phone');
    var number = phone.value;
    if(number == ''){
        phone.value = '09';
    }
}
function listenMaritalStatus() {
    var status = document.getElementById('marital_status');
    var marital_id = document.getElementById('marital_id');
    var marital_label = document.getElementById('marital_label');
    var selected = status.value;
    if(selected == 'Fuudhera'){
        marital_id.style = 'visibility:visible';
        marital_label.innerText = 'Maqaa Haadhamanaa';
    }else if(selected == 'Hin fuune'){
        marital_id.style = 'visibility:hidden';
    }else if(selected == 'Heerumteetti'){
        marital_id.style = 'visibility:visible';
        marital_label.innerText = 'Maqaa Abbaamanaa';
    }else if(selected == 'Hin heerumne'){
        marital_id.style = 'visibility:hidden';
    }else if(selected == 'Kadhimameera'){
        marital_id.style = 'visibility:visible';
        marital_label.innerText = 'Maqaa Kaadhimaa';
    }else if(selected == 'Kadhimamteetti'){
        marital_id.style = 'visibility:visible';
        marital_label.innerText = 'Maqaa Kaadhimaa';
    }
}
function printPage(){
    var restore_page = document.body.innerHTML;
    document.getElementById("view_methods").style = "display:none";
    document.getElementById("display_children").style = "display:none";
    // document.getElementById("miseensa_miti").style = "display:none";
    // document.getElementById("maqaa_haadha_manaa").style = "color:#404040";
    var print_content = document.getElementById("paper_form").innerHTML;
    document.body.innerHTML = print_content;
    window.print();
    document.body.innerHTML = restore_page;
}
function printMembersInfo(){
    var restore_page = document.body.innerHTML;
    document.getElementById("show_admins").style = "border-collapse: collapse";
    document.getElementById("show_admins").setAttribute("class","print_table_style");
    var print_content = document.getElementById("hold_all_admins").innerHTML;
    document.body.innerHTML = print_content;
    window.print()
    document.body.innerHTML = restore_page;
    document.getElementById("show_admins").style = "border-collapse: separate";
}
function printKurno(){
    var restore_page = document.body.innerHTML;
    document.getElementById("display_kurno").style = "border-collapse: collapse";
    document.getElementById("display_kurno").setAttribute("class","print_table_style");
    var print_content = document.getElementById("hold_all_admins").innerHTML;
    document.body.innerHTML = print_content;
    window.print();
    document.body.innerHTML = restore_page;
    document.getElementById("display_kurno").style = "border-collapse: separate";
}
function printReport(){
    var restore_page = document.body.innerHTML;
    document.getElementById("print_report_button").style = "display:none";
    var print_content = document.getElementById("print_report").innerHTML;
    document.body.innerHTML = print_content;
    window.print();
    document.body.innerHTML = restore_page;
}
function printAnnualReport(ammount){
    var restore_page = document.body.innerHTML;
    var i  = 0;
    var paper;
    document.getElementById("print_report_button").style = "display:none";
    var print_content = document.getElementById("all_members_data_holder").innerHTML;
    document.body.innerHTML = print_content;
    window.print();
    document.body.innerHTML = restore_page;
}
