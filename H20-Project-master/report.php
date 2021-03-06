<?php error_reporting(E_ERROR | E_WARNING | E_PARSE); ?>
<?php include('./class/loginClass.php');?>
<?php include('./class/User.php'); ?>
<?php include_once('./class/Survey.php'); ?>
<?php $class = new mainLogin(); ?>

<html>
	<head>
		
	<style type="text/css">
#wrap {
   width:100%;
   margin:0 auto;
}
#left_col {
   float:left;
   width:50%;
}
#right_col {
   float:right;
   width:50%;
}
</style>
		
	</head>
<body> 
	
<h1> Employee Evaluation Results</h1>

	
	
	<?php ini_set('error_reporting', E_ALL);?>
<?php
	                                       # gets User and Surveys
	$class = new mainLogin();
	$user = $class->getCurrentUser($class->username_field);
	echo "Employee Report For: " . $user;              
	$myUser= User::loadF($user);
	
	$s = new Survey();
	$a = new Survey();
    $a = Survey::load($myUser-> adminSurvey);
	$s=Survey::load($myUser-> selfSurvey);
	



	$Question = array(               #creates an Array for the questions
	
     #Communications  [1 - 5]  #6 comments
     "Expresses Ideas and Thoughts Verbally",
     "Expresses Ideas and Thoughts in Written Form",
     "Exhibits Good Listening and Comprehension",
     "Keeps Others Adequately Informed",
     "Uses Appropriate Communication Methods",
       "Comments",
      #Cooperation  [7- 12]  13 comments
	 "Establishes and Maintains Effective Relations",
     "Exhibits Tact and Consideration",
     "Displays Positive Outlook and Plesent Manner",
     "Offers Assistance and Support to Coworkers",
     "Works Cooperatively in Group Situations",
     "Works Actively to Resolve Conflicts",
        "Comments",
      #Cost Consciousness [14 - 17] 18 comments
     "Works Within Approved Budget",
     "Conserves Organizational Resources",
     "Develops and Implements Cost-saving Measures",
     "Contributes to Profits and Revenue",
        "Comments",
     #Dependability  [19 - 24] 25 comments
     "Responds to Requests for Service and Assistance",
     "Follows Instructions, Responds to Management Directions",
     "Takes Responsibility for Own Actions",
     "Commits to Doing Best Job Possible",
     "Keeps Commitments",
     "Meets Attendance and Punctuality Guidelines",    
       "Comments",
     #Initiative  [26 - 31] 32 comments
     "Volunteers Readily",
     "Undertakes Self-Development Activities",
     "Seeks Increased Responsibilities",
     "Takes Independant Actions and Calculated Risks",
     "Looks for and Takes Advantages of Opportunities",
     "Asks for Help When Needed",
       "Comments",
     #Job Knowledge [33-38] 39
     "Competent in Required Job Skills and Knowledge",
     "Exhibits Ability to Learn and Apply New Skills",
     "Keeps Abreast of Current Developments",
     "Requires Minimal Supervision",
     "Displays Understanding of How Job Relates to Others",
     "Uses Resources Effectively",
        "Comments",
     #Judgement [40 - 44] 45
     "Displays Willingness to Make Decisions",
     "Exhibits Sound and Accurate Judgement",
     "Supports and Explains Reasoning for Decisions",
     "Includes Appropriate People in Decision-Making Process",
     "Makes Timely Decisions",
        "Comments",
     #Planning and Organization [46-51] 52
     "Prioritizes and Plans Work Activities",
     "Uses Time Efficiently",
     "Plans for Additional Resources",
     "Integrates Changes Smoothly",
     "Sets Goals and Objectives",
     "Works in an Organized Manner",
       "Comments",
     #Problem Solving   [53 - 57] 58
     "Identifies Problems in a Timely Manner",
     "Gathers and analyzes Information Skillfully",
     "Develops Alternative Solutions",
     "Resolves Problems in Early Stages",
     "Works Well in Group Problem-Solving Situations",
       "Comments",
     #Quality [59 - 63]64
     "Demonstrates Accuracy and Thoroughness",
     "Displays Commitment to Excellence",
     "Looks for Ways to Improve and Promote Quality",
     "Applies Feedback to Improve Preformance",
     "Monitors Own Work to Ensure Quality",
     "Comments",
     #Quantity[65 - 69] 70
     "Meets Productivity Standards",
     "Completes Work in a Timely Manner",
     "Strives to Increase Productivity",
     "Works Quickly",
     "Achieves Established Goals",
     "Comments",
     #Use of Technology [71- 75]
     "Demonstrates Required Skills",
     "Adapts to New Technologies",
     "Troubleshoots Problems",
     "Uses Technology to Increase Productivity",
     "Keeps Technical Skills up to Date",
    
) ;                                                          #end of array

   
   
     
	 $myUser->draw("RandomString");                           #calls draw function
	
	

	
	
	for ($i = 0; $i <= 75; $i++) {                            #iterates through all questions
   
    if($i == 0)echo "<div id=\"wrap\"> <div id=\"left_col\"> <h2> Communication  </h2>";
    if($i == 6)echo "<h2> Cooperation </h2>";
    if($i == 13)echo "<h2> Cost Consciousness </h2>";
    if($i == 18)echo "<h2> Dependability  </h2>";
    if($i == 25)echo "<h2> Initiative </h2>";
    if($i == 32)echo "<h2> Job Knowledge  </h2>";
    if($i == 39)echo "</div> <div id=\"right_col\"> <h2> Judgement  </h2>";
    if($i == 45)echo "<h2> Planning and Organization </h2>";
	if($i == 52)echo "<h2> Problem Solving </h2>";
	if($i == 58)echo "<h2> Quality </h2>";
	if($i == 64)echo "<h2> Quantity </h2>";
	if($i == 70)echo "<h2> Use of Technology  </h2>";
	
	
    echo "<b>" . $Question[$i] . "</b> <br />";
	
	
	echo "Self-Evaluation Score: ";
	echo $s -> answers[$i];
	
	
	echo "<br /> Evaluator Score: ";
	echo $a -> answers[$i];
	echo "<br />";
	}
	
	
	 echo "</div></div><br />";
?>
</body>
</html>
