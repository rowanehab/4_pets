Types of Users in this project
• Normal User will be referred to as “User”
• Admin User
User Roles
• Normal users can be added by signing up or by an “Admin”
• Admins are “Users” with elevated privileges
• Admins can only be added by other “Admin”
• Admin can upgrade a “User” into “Admin”
• Admin can suspend “Users”
Registration / login scenarios
• Registration is done for “Users”
o Regular info is required to complete the registration process (including email address)
o Email address is unique for each user
o After registration the “User” account status is “not activated” and an email message is 
sent to the user to activate his account (activation link)
o After activation the user can login as normal using the username/password
• The login process is the same for both “User and Admin”
o After the login process the logged in “User or Admin” is redirected to the corresponding 
landing page according to the user role
• Forgetting password capabilities must be provided for all user types
o The user can use the “forgot password” process, the system will send an email message 
to the user corresponding email including the username/password
• Suspended users can’t login and a message must be provided “your account is suspended 
contact the system admin”
o This can change after an admin unsuspend the user account 
General Requirements:
• A landing pages (for visitors – not logged in)
• A landing page for users and for admins (could be the same as the above with appropriate 
customization)
• Signup / login / forgot password capabilities
• Create a Web page that includes various types of hyperlinks.
• Create a Web page that includes various multimedia objects.
• Put an advertisement in your web information system.
• At least five input forms (add / update / delete) not including (Signup / login / forgot password)
• At least four reports [at least one of each of the following]
o Classic Report 
o Ranking Report 
o Pivot Tables Report 
o Interactive Report
• At least three graphs (pie chart / bar chart …etc.)
• Every user must have a profile (can update the info including a personal photo “with the ability 
to upload and change”)
• Every input form control must be implement the appropriate validation
o Required fields validation 
o Correct format validation 
o Range validation 
o Regular expression validation 
o Compare validation 
o Confirmation fields validation 
o Validation feedback
o Custom validation
• Do masking for some of the data inputs relevant to your system.
• All pages must be secured by means of “sessions” meaning
o Visitors can only view (landing page / signup / login / forgot password page)
o Users can only view their profile and the appropriate pages
o Admins can view all pages including the (Users control page)
• The database schema must include at least five tables connected by means of foreign keys (no 
orphan / unconnected tables)
• (You should do complex queries including joins) and generate reports containing the results of 
the queries.
