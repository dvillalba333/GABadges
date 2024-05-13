$(function() {
	
    // Initializing an array with values
    var graduateAttributes = ['','Academic skills', 'Applying knowledge', 'Research and critical thinking', 'Digital capability', 'Interpersonal skills','Working with others','Equality and inclusion','Ethics and sustainability','Positive wellbeing','Purpose','Personal development','Enterprising'];
    var graduateSubAttributes = ['','Academic writing', 'Numeracy and data', 'Study Skills', 'Translating knowledge', 'Problem solving','Exchanging knowledge','Research skills','Research impact','Critical thinking','Digital fluency','Digital communication','Digital citizenship','Communication','Networking','Emotional intelligence','Collaboration','Influencing','Leadership','Community engagement','Global awareness','Inclusivity','Integrity','Appropriate conduct','Sustainability','Self care','Autonomy','Self-awareness','Healthy relationships','Defining purpose','Positive mindset','Growth mindset','Determination','Resilience','Innovation','Commercial awareness','Adaptability'];
    var graduateSubAttributesDesc = ['','Using clear, concise language appropriate to the academic discipline and credible evidence to present written arguments or reports, using relevant referencing and citation', 'Appropriately calculating, analysing and presenting numerical data', 'Selects, uses and seeks existing and new knowledge to develop intellect; using learning and study time effectively', ' ', ' ',' ',' ',' ',' ','',' ',''];
    var graduateAttributesColor = ['','#d9a9e3', '#d9a9e3', '#d9a9e3', '#d9a9e3', '#fa6670','#fa6670','#fa6670','#fa6670','#65c9ea','#65c9ea','#65c9ea','#65c9ea'];
	var path ="https://sam.group.shef.ac.uk/gtabadges/";
	
    // Function to copy text to the clipboard
    function copyToClipboard(text) {
        var tempInput = $('<input>'); // Create a temporary input element
        $('body').append(tempInput); // Append it to the body element
        tempInput.val(text).select(); // Set the input value and select it
        document.execCommand('copy'); // Execute the copy command
        tempInput.remove(); // Remove the temporary input element
    }
    
    html2canvas(document.querySelector("#result")).then(canvas => {
            let img = document.createElement('img');
            img.src = canvas.toDataURL();
            $('#imageContainer').append(img);
     });

	$("#copyCode").hide();	
	$("#explanation").hide();
	$("#labelExplanation").hide();	
		
    $("#attribute").change(function() {
        var attribute = $("#attribute").val();
        $("#attributedetails").empty();
         
        $('input[type="checkbox"]:checked').prop('checked', false); 
         
        if (attribute == 1) $("#attributedetails").append("<h4>Academic writing<input type='checkbox' name='checkbox1' value='Academic writing'></h4> - Using clear, concise language appropriate to the academic discipline and credible evidence to present written arguments or reports, using relevant referencing and citation <br/> <h4>Numeracy and data <input type='checkbox' name='checkbox2' value='Numeracy and data'></h4> - Appropriately calculating, analysing and presenting numerical data <br/> <h4>Study skills <input type='checkbox' name='checkbox3' value='Study Skills'></h4> - Selects, uses and seeks existing and new knowledge to develop intellect; using learning and study time effectively");
        if (attribute == 2) $("#attributedetails").append("<h4>Translating knowledge <input type='checkbox' name='checkbox4' value='Translating knowledge'></h4> - Applying and translating knowledge and skills to contexts and challenges within and beyond your studies<h4>Problem solving <input type='checkbox' name='checkbox5' value='Problem solving'></h4> - Exploring innovative approaches to solving problems. Developing creativity, understanding, and challenging existing ideas<h4>Exchanging knowledge <input type='checkbox' name='checkbox6' value='Exchanging knowledge'></h4> - Demonstrating interest in and understanding of the positive application of knowledge in a working environment");
        if (attribute == 3) $("#attributedetails").append("<h4>Research skills <input type='checkbox' name='checkbox7' value='Research skills'></h4> - Experienced in the processes and methods of research - discovering, understanding and creating information<h4>Research impact <input type='checkbox' name='checkbox8' value='Research impact'></h4> - Considering impact and disseminating the benefits of research and knowledge to wider community and society<h4>Critical thinking <input type='checkbox' name='checkbox9' value='Critical thinking'></h4> - Critically appraising, questioning, analysing and interpreting a variety of evidence, and applying research skills in different contexts");
        if (attribute == 4) $("#attributedetails").append("<h4>Digital fluency <input type='checkbox' name='checkbox10' value='Digital fluency'></h4> - Sourcing, using and creatively applying appropriate digital tools, information and skills<h4>Digital communication <input type='checkbox' name='checkbox11' value='Digital communication'></h4> - Assessing and presenting data, information and evidence using software and digital media<h4>Digital citizenship <input type='checkbox' name='checkbox12' value='Digital citizenship'></h4> - Developing and maintaining a professional and ethical online presence and identity");
        if (attribute == 5) $("#attributedetails").append("<h4>Communication <input type='checkbox' name='checkbox13' value='Communication'></h4> - Communicating confidently in writing, in person and online for different purposes and audiences<h4>Networking <input type='checkbox' name='checkbox14' value='Networking'></h4> - Using interpersonal skills to build and maintain positive relationships through networking<h4>Emotional intelligence <input type='checkbox' name='checkbox15' value='Emotional intelligence'></h4> - Recognise own and others emotions to guide thinking and behaviour");
        if (attribute == 6) $("#attributedetails").append("<h4>Collaboration <input type='checkbox' name='checkbox16' value='Collaboration'></h4> - Working effectively with others and in teams, encouraging collaboration and contributing positively<h4>Influencing <input type='checkbox' name='checkbox17' value='Influencing'></h4> - Positively contributing, influencing and inspiring others<h4>Leadership <input type='checkbox' name='checkbox18' value='Leadership'></h4> - Developing leadership potential and capability");
        if (attribute == 7) $("#attributedetails").append("<h4>Community engagement <input type='checkbox' name='checkbox19' value='Community engagement'></h4> - Actively participate and positively affect others in personal, local, global or virtual communities<h4>Global awareness <input type='checkbox' name='checkbox20' value='Global awareness'></h4> - Global competence and cultural intelligence, engaging with global issues and contexts<h4>Inclusivity <input type='checkbox' name='checkbox21' value='Inclusivity'></h4> - Recognising and valuing different abilities, backgrounds, beliefs and ways of living");
        if (attribute == 8) $("#attributedetails").append("<h4>Integrity <input type='checkbox' name='checkbox22' value='Integrity'></h4> - Acting ethically, honestly and fairly in personal, academic and workplace settings<h4>Appropriate conduct <input type='checkbox' name='checkbox23' value='Appropriate conduct'></h4> - Demonstrating appropriate and socially responsible behaviour, including academic conduct<h4>Sustainability <input type='checkbox' name='checkbox24' value='Sustainability'></h4> - Acquiring the knowledge and skills to promote societal and environmental sustainability");
        if (attribute == 9) $("#attributedetails").append("<h4>Self care <input type='checkbox' name='checkbox25' value='Self care'></h4> - Identifying and doing things to enhance mental and physical health, confidence and self esteem<h4>Autonomy <input type='checkbox' name='checkbox26' value='Autonomy'></h4> - Making own decisions about how to think and behave, pursuing freely chosen goals<h4>Self-awareness <input type='checkbox' name='checkbox27' value='Self-awareness'></h4> - Reflective and understanding of personal strengths, values and areas for development");
        if (attribute == 10) $("#attributedetails").append("<h4>Healthy relationships <input type='checkbox' name='checkbox28' value='Healthy relationships'></h4> - Developing positive, trusting, and supportive relationships <h4>Defining purpose <input type='checkbox' name='checkbox29' value='Defining purpose'></h4> - Finding a sense of direction in life, defining personal values and goals and working to fulfil them<h4>Positive mindset <input type='checkbox' name='checkbox30' value='Positive mindset'></h4> - Approaching challenges with a positive outlook, self-belief and a sense of perspective");        
        if (attribute == 11) $("#attributedetails").append("<h4>Growth mindset <input type='checkbox' name='checkbox31' value='Growth mindset'></h4> - Recognising the value of continuing development and effective life and career management techniques<h4>Determination <input type='checkbox' name='checkbox32' value='Determination'></h4> - Effectively planning and managing tasks within deadlines - getting things done<h4>Resilience <input type='checkbox' name='checkbox33' value='Resilience'></h4> - Effectively re-framing, learning and recovering quickly from difficulties and setbacks");        
        if (attribute == 12) $("#attributedetails").append("<h4>Innovation <input type='checkbox' name='checkbox34' value='Innovation'></h4> - Curious, creative and innovative - considering and developing new approaches and ideas <h4>Commercial awareness <input type='checkbox' name='checkbox35' value='Commercial awareness'></h4> - Demonstrating an understanding of commercial and organisational decisions and wider contexts<h4>Adaptability <input type='checkbox' name='checkbox36' value='Adaptability'></h4> - Open minded, willing to learn new things, take on new challenges and make adjustments");        
	
	    $("#copyCode").hide();	
	    $("#explanation").hide();
	    $("#labelExplanation").hide();	

        $("#attributedetails").show();
        $("#explanation").show();
	    $("#labelExplanation").show();	         
    });

    $("#createAttribute").click(function() {
        //variable needed for the function    
        var d = new Date();
        var code = $("#code").val();        
        var attribute = $("#attribute").val();
        var explanation = $("#explanation").val();
        var sga1="0";
        var sga2="0";        
        var sga3="0";        
        var subattributes = "<br/>";
        
        var index=1;
        $('input[type="checkbox"]:checked').each(function() {
          var checkboxValue = $(this).val(); // Get the value of the checked checkbox
          subattributes = subattributes + checkboxValue + "<br/>";
          if ((index==1) && ($(this).attr('name').length>2)) sga1 = $(this).attr('name').substr(8,2);
          if ((index==2) && ($(this).attr('name').length>2)) sga2 = $(this).attr('name').substr(8,2);
          if ((index==3) && ($(this).attr('name').length>2)) sga3 = $(this).attr('name').substr(8,2);
          index++;
          // Perform further actions with the checked checkbox value
        });

        $("#result").html('<table style="width:400px;border-collapse: collapse; border:2px solid '+graduateAttributesColor[attribute]+';"><tr style="font-size: 1.5em;"><th colspan="2">SGA Match</th></tr><tr style="background-color:'+graduateAttributesColor[attribute]+';font-size:1.5em;"><td style="width: 20%;"><img style="max-width:100%;" alt="'+graduateAttributes[attribute]+'" src="'+path+'images/sga'+attribute+'.PNG"/><td>'+graduateAttributes[attribute]+'<div style="font-size:0.7em;display:inline;">'+subattributes+'</div><td></td></tr><tr><td colspan="2">' + explanation+'</td></tr></table>');
        $("#attributedetails").hide();
        $("#copyCode").show();	
        
        //sending information to the database to create a new badge
		var options=new Array();
		options[0] = attribute;
		options[1] = sga1;
		options[2] = sga2;
		options[3] = sga3;
		options[4] = explanation;
        
		//creating a new badge
		$.post('index.php', {
			option: 1,
			code:code,
			parameters:options.join("_"),
			date:d.toISOString().slice(0, 19).replace('T', ' ')
		}, function(data) {

		});	   
        
    });
    
    
    $('#copyButton').click(function() {
        var textToCopy = $('#result').html(); // Get the text to copy
        copyToClipboard(textToCopy); // Call the copyToClipboard function
    });
    
});
