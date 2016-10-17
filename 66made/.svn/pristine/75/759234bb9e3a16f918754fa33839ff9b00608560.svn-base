var Incomplete_information_prompt = document.getElementById("Incomplete_information_prompt")
var Invalid_email_reminder = document.getElementById("Invalid_email_reminder")
function check(form) {
    if(form.email.value=='') {
        Invalid_email_reminder.style.display="block"
        form.email.focus();
        return false;
    }else{
         Invalid_email_reminder.style.display="none"
    }
    if(form.name.value=='') {
        Incomplete_information_prompt.style.display="block"
         form.name.focus();
        return false;
    }else{
         Incomplete_information_prompt.style.display="none"
    }
    if(form.title.value=='') {
        Incomplete_information_prompt.style.display="block"
         form.title.focus();
        return false;
    }else{
         Incomplete_information_prompt.style.display="none"
    }
    if(form.content.value=='') {
        Incomplete_information_prompt.style.display="block"
         form.content.focus();
        return false;
    }else{
         Incomplete_information_prompt.style.display="none"
    }
    return true;
}