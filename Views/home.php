<?php include_once("header.php"); ?>
<div class="home">
    <div class="user-form-container">
        <form action="/update" method="POST" id="user_form" style="max-width: 900px;">

            <div class="flex" style="flex-wrap: wrap; justify-content: center">
                <div class="flex-column">
                    <label for="user_name">Name:</label>
                    <input type="text" id="user_name" name="name">
                </div>

                <div class="flex-column">
                    <label for="user_email">Email:</label>
                    <input type="text" id="user_email" name="email">
                </div>

                <div class="flex-column">
                    <label for="user_email">Password:</label>
                    <input type="text" id="user_password" name="password">
                </div>
            </div>
            <hr>
            <div id="append_fields_there" class="flex" style="flex-wrap: wrap; justify-content: center">
                <!-- Place for input fields -->
            </div>
            <hr>
        </form>

        <div class="float-right" id="button_node">
            <button id="attr_button"> + Add your own attribute? (unlimited eddition)</button>
            <button id="submit_form">Save Form</button>
        </div>

    </div>
</div>

<script>

    //Yes. this is not good place for JS.. this must be in Public/js/ folder with extension js.
    //....
    //User object

    let data = <?php  echo $user->toJson(); ?>;


    //get data entries of User object

    const entriesOfUserObject = Object.entries(data);


    //Attributes for user

    let customAttributes = <?php  echo $attributes; ?>;


    //Define parent nodes where insert new html fields

    const buttonNodeIdWhereAppendHtml = MagicUnicorn("#button_node");
    const formNodeIdWhereAppendHtml = MagicUnicorn("#append_fields_there");

    //After click "+ Add your own attribute"
    // custom input field will be added.

    MagicUnicorn("#attr_button").click(addCustomInputField);


    //Listen for submit form click event.

    MagicUnicorn("#submit_form").click(()=>{

        //MagicUnicorn grabs all form values and
        //send with POST request to URL "/update"

        MagicUnicorn().letDataFlyAwayViaAjaxPostRequest("/update",MagicUnicorn("#user_form").grabFormValues());

    });

    //Iterate through customAttributes and render html for every row;

    for(let aa = 0; aa < customAttributes.length ; aa ++)
    {
        //grab and define variables for attributes

        const id = customAttributes[aa].id;
        const attribute = customAttributes[aa].attribute;
        const value = customAttributes[aa].value;

        //For every row
        // set attributes and values into 'renderCustomFieldsFromDbHtml'
        //render input fields

        formNodeIdWhereAppendHtml.appendHtml('beforeend', renderCustomFieldsFromDbHtml(id, attribute, value));
    }


    //Loop through User object and render fields with values.

    for (const [name, value] of entriesOfUserObject) {

        if(name !== "name" && name !== "email" && name !== "password"){
            if(value){

                //render fields

                formNodeIdWhereAppendHtml.appendHtml('beforeend', inputField(name));

                //insert values

                MagicUnicorn(`#user_${name}`).setValue(value);

                //add buttons for every user property

                buttonNodeIdWhereAppendHtml.appendHtml("afterbegin", addUserBtnHtml(name));

                //hide buttons for properties what is rendered

                MagicUnicorn(`#add_${name}`).hide();

            }else{

                //If value is empty, then render only buttons.

                buttonNodeIdWhereAppendHtml.appendHtml("afterbegin", addUserBtnHtml(name))
            }
        }else{

            //set name, email, password values

            MagicUnicorn(`#user_${name}`).setValue(value);
        }
    };


    //Button parent node.
    //loop through all childs

    for (let ii = 0; ii < buttonNodeIdWhereAppendHtml.element[0].childNodes.length; ii++)
    {
        //get child id.

        let childId = buttonNodeIdWhereAppendHtml.element[0].childNodes[ii].id;

        if(childId){

            if(childId.substr(0, 3) === "add")
            {
                //if button child ID starts with "add"
                //then listen for click event.

                MagicUnicorn("#" + childId).click(()=>{

                    //When button with id "add" is clicked.
                    // grab from id substring. Everything what is after "add_" and render new html.
                    // why pass everything after "add_"?..
                    //from 'add_example"  new input field name would be "example"

                    formNodeIdWhereAppendHtml.appendHtml("beforeend", inputField(childId.substr(4)));

                    //hide button

                    MagicUnicorn("#" + childId).hide();

                });
            }
        }
    };


    function addCustomInputField(){

        //prompt for user input field name.

        let fieldName = prompt("Enter field name: ");

        if(fieldName){

            //render custom input field.

            formNodeIdWhereAppendHtml.appendHtml('beforeend', customInputFieldHtml(fieldName))
        }

    };

    function removeField(fieldToRemove)
    {
        //show button for User propertie after remove field.

        MagicUnicorn("#" + fieldToRemove).showInline();

        //Get field parent node and remove.

        document.getElementsByClassName(fieldToRemove)[0].remove();

        //check if field is "add_" or "custom_".
        //and update or delete table entries in DB..

        updateOrDelete(fieldToRemove);

    };


    function updateOrDelete(fieldToRemove){

        //check if field is "add_" or "custom_"
        //if "add_" then update User entries in users table..
        //if "custom_" then delete custom attributes from attributes table.

        if(fieldToRemove.substr(0,4) === "add_"){

            MagicUnicorn().letDataFlyAwayViaAjaxPostRequest("/update", fieldToRemove.substr(4));

        }else if(fieldToRemove.substr(0,7) === "custom_"){

            MagicUnicorn().letDataFlyAwayViaAjaxPostRequest("/delete",fieldToRemove);

        }
    }


    //Capitalize first letter or word

    function capitalize(name){
        return name.charAt(0).toUpperCase() + name.slice(1)
    };


    /*****************
     *
     * HTML
     * TO
     * RENDER
     *
     *****************/


    //Html script for User object properties

    function addUserBtnHtml(name)
    {
        return`
        <button id="add_${name}">+ ${capitalize(name)}</button>
        `
    }


    //HTML Custom input field. (**render automatic for every data entry in DB)

    function renderCustomFieldsFromDbHtml(id,attribute,value)
    {
        return`
            <div class="flex-column custom_${id}">
                <label for="user_${attribute}">${capitalize(attribute)}: <span onclick="removeField('custom_${id}')"
                       class="btn-remove">X</span></label>
                <input type="text" id="user_${attribute}" value="${value}" name="custom_${attribute}">
            </div>

        `
    }


    //HTML Custom input field.(**render on click event)

    function customInputFieldHtml(fieldToAdd){
        return `
            <div class="flex-column add_custom_${fieldToAdd}">
                <label for="user_custom_${fieldToAdd}">${capitalize(fieldToAdd)}: <span onclick="removeField('add_custom_${fieldToAdd}')"
                       class="btn-remove">X</span></label>
                <input type="text" id="user_custom_${fieldToAdd}" value="" name="custom_${fieldToAdd}">
            </div>

        `
    };


    //HTML Input fields for User Model properties.

    function inputField(fieldToAdd){
        return `
            <div class="flex-column add_${fieldToAdd}">
                <label for="user_${fieldToAdd}">${capitalize(fieldToAdd)}: <span onclick="removeField('add_${fieldToAdd}')"
                       class="btn-remove">X</span></label>
                <input type="text" id="user_${fieldToAdd}" value="" name="${fieldToAdd}">
            </div>

        `
    };

</script>


<?php include_once("footer.php"); ?>


