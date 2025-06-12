# FitMuslim GO Proposal
## SECTION 1 - GROUP C
Group Members
| Name                                 | Matric No |
| ------------------------------------ |:---------:|
| Nur Nisa Humairah Binti Rosdi        |  2122408  |
| Nur Alia Alina Binti Abdul Rahman    |  2223988  | 
| Nur Balqis binti Sazalee             |  2218348  |
| Nurul 'Aisyah Binti Ani @ Sani       |  2210022  |
| Nurfathin Atirah Binti Mohammad Udin |  2118168  |

## INTRODUCTION
Staying active and healthy is something we all strive for but for many Muslims, it’s also about honoring our faith. Whether it’s making time to move between prayers, choosing workouts that align with our values, or finding motivation in community, fitness can be more meaningful when it’s connected to who we are.
That’s where FitMuslim Go! comes in.
This app is built for Muslims who want to take care of their bodies while staying true to their beliefs. It helps make fitness simple, accessible, and rooted in Islamic principles. Whether you're just getting started or already on your fitness journey, FitMuslim Go! makes it easier to stay motivated, track your progress, and even connect with others on the same path.

## OBJECTIVES
- Promote a healthy lifestyle among muslims
- integrate faith with fitness
- ensure easy access and usability
- encourage community engagement and support

## FUNCTION AND FUNCTIONALITIES
### A. Authentication Functionality <br/>
#### Core Functionalities: <br/>
**1. User Registration**
- Users provide email and password.
- Email verification sent upon registration.

**2. User Login**
- Secure email/password login.

**3. Password Recovery**
- Forgot password option using email.
- Password reset link sent to the user's email.
- Secure process for password update.

**4. Profile Management**
- Users can update profile picture and personal info.
- Manage fitness goals and track progress.

**5. User Logout**
- Option for users to log out securely.
- Session data cleared on logout.


### B. Workout Log Management (Nurul 'Aisyah) <br/>
+ **Main Purpose**: Provide user with and easy way to log and monitor their workouts progress and make necessary adjustments to their workout routines based on performance to stay on track and motivated.

#### Core Functionalities: <br/>
**1. Log Workouts (Post CRUD)**
- Users can add new workouts, including essential details like:
  + Workout Type (e.g., Cardio, Strength Training, Yoga)
  + Duration
  + Calories Burned
  + Sets/Reps 
- CRUD Operations:
  + Create new workout logs
  + Edit workouts (users can modify their own entries)
  + Delete workout entries (Access by user only on their own logs)

**2. Track Progress and History**
- Historical workout data and track improvements (Increase workout duration, reps, or calories burned)
- Progress graph

**3. Search and Filter**
- Searching process through user workout logs by:
  + Data range
  + workout type
  + Duration / Calories Burned

**4. Edit and Delete Workout Entries**
- Users can modify / remove any inaccurate or outdated workout data


### C. Goal & Progress Dashboard (Nurfathin Atirah) <br/>
**Main Purpose:**
To empower users to set personal fitness goals and visually track their progress over time, aligning with both physical health aspirations and faith-driven discipline. This feature ensures users stay motivated by providing clear, measurable outcomes in their fitness journey.

**Core Functionalities:**

**1. Goal Setting (Post CRUD)**
Users can create and manage their own fitness goals. Each goal includes:

- Goal Type (e.g., Weight Loss, Strength, Endurance, Steps/Movement Goals, Consistency)
- Goal Title (custom name for easy recognition)
- Target Metric (e.g., weight in kg, number of steps, workout hours/week)
- Start & Target Dates
- Current Progress Input


**CRUD Operations:**

- Create new goals
- Read/View all set goals (active/inactive)
- Update/Edit existing goals (e.g., change target, adjust timeline)
- Delete goals (if no longer relevant)

**2. Visual Progress Tracker**

- Real-time graphical display of progress, helping users stay accountable and encouraged:
- Progress Bars and Completion Percentage
- Graph Charts (Line or Bar) showing growth over time
- Visual indicators for goal milestones or halfway marks

**3. Goal Achievement Summary**
- Once a goal is completed, users receive a visual summary:
- Badge/Certificate of Completion
- Date of Achievement
- Before vs After Comparison (optional stats or images)

**4. Reminders & Notifications**
Users can set reminders for:

- Progress check-ins (daily/weekly)
- Goal deadlines approaching
- Encouragement/motivation nudges ("You're halfway there!")


**5. Filter and Sort Goals**
Users can filter goals by:

- Status (active, completed, overdue)
- Goal Type (weight, strength, stamina, etc.)
- Timeframe (weekly, monthly, yearly)

Sorting options:

- By date created
- By progress percentage
- By target deadline


### D. Nutrition & Meal Planner (Nur Balqis)  <br/>

**Main Purpose:**
To help users maintain a balanced and halal diet by planning meals, tracking nutritional intake, and aligning food choices with their health and fitness goals—while staying in harmony with Islamic dietary principles.

### Core Functionalities:

#### **1. Nutrition Tracker Dashboard**

Visually displays daily nutritional intake with color-coded indicators:

* **Macronutrient Boxes**:

  * **Protein**: e.g., 65g / 120g (green)
  * **Carbs**: e.g., 180g / 300g (orange)
  * **Fats**: e.g., 40g / 70g (red)
* **Donut Chart**:

  * Real-time visual of Protein, Carbs, and Fats proportions.
* **Water Intake Tracker**:

  * Emoji-based water glasses.
  * `+ / -` buttons to log consumption (e.g., 3 out of 8 glasses).

#### **2. Meal Planning and Logging (CRUD System)**

Users can manage their daily meals through a structured log:

**Meal Entry Fields:**

* Meal Type: *Breakfast, Lunch, Dinner, Snack*
* Food Items: *Multiple entries possible (e.g., Bread, Peanut Butter)*
* Portion Size
* Calories
* Macronutrients: *Carbs, Protein, Fat*
* Halal Indicator: *Yes/No or Certified Source*

**CRUD Operations:**

**Create**: Add new meal logs with nutritional and halal details.
**Edit**: Modify existing meals (user-specific).
**Delete**: Remove logged meals.
**View**: See a full list under "Today's Meals" (table view).


### E. Daily Islamic Motivation (Nur Alia Alina) <br/>
+ **Main Purpose**:To inspire and uplift users on their fitness journey by providing daily Islamic reminders, quotes, or motivational content that promotes discipline, self-care, and spiritual well-being in alignment with Islamic teachings.
  
- Admin or authorized users can create daily motivational posts.
- Each post includes:
   + A short Islamic quote or reminder (e.g., from the Qur'an or Hadith)
   + Optional description or reflection
   + Image or visual design for aesthetic appeal
   + Difficulties level (beginner, intermediate, advanced)
   + Category/tag (e.g., “Discipline,” “Gratitude,” “Strength”)
- Post can be:
   + Created  (only by the author)
   + Updated/Edited (only by the author)
   + Deleted (only by the author or admin)
   + Viewed/Read publicly <br/>
   + Users can like or bookmark motivational posts
   + Users can share posts to social media or within the app.

### F. Workout Routine Sharing & Forum (Nur Nisa Humairah) <br/>
+ **Main Purpose**: To allow users to share their workout routines, engage in discussions, and provide support or motivation to other users. <br/>

**Core Functionalities:** <br/>

**1. Workout Routine Sharing (Post CRUD)** 
- Users can create posts and share their custom workout routines.
- Each post can include:
   + Title
   + Description
   + Targeted Muscles (tags: arms, legs, core, full-body, etc.)
   + Difficulties level (beginner, intermediate, advanced)
   + Attached media (images or videos)
- Post can be:
   + Created
   + Edited (only by the author)
   + Deleted (only by the author or admin)<br/>
   
**2. Like and Comment System**
- Users can like a post
- Users can leave comments
- Users can edit or delete their own comments <br/>

**3. Forum Section (Q&A Style)**
- Users can create topics/questions (e.g., “How to build stamina for futsal?”)
- Others can reply to the topic
- Replies can be liked or marked as helpful by the original poster  <br/>

### ENTITY RELATIONSHIP DIAGRAM (ERD)
![Image](https://github.com/user-attachments/assets/25643959-0457-4529-851c-e320e7eb23d0)

### SEQUENCE DIAGRAM

![diagram-export-18-05-2025-10_56_08-am](https://github.com/user-attachments/assets/3cc4ea4c-ee5a-426d-8487-205dd62db4e0)

### MOCKUPS
1. Dashboard
![image](https://github.com/user-attachments/assets/eb9b6b7f-513f-4fe4-8f5c-7e49a8791187)

2. Workout Tracker
![image](https://github.com/user-attachments/assets/ca47fb33-ec03-4be5-a514-80ff95e924e9)

3. Nutrition Tracker
![image](https://github.com/user-attachments/assets/bcf5fb1c-205b-4400-9b26-5b61ca888f2d)

4. Goal and Progress
![image](https://github.com/user-attachments/assets/3fb2f7c0-07a8-4961-b4f5-3f8c10763b4d)

5. Daily Motivation
![image](https://github.com/user-attachments/assets/c445dd52-f869-4028-9535-70e5524de40d)
![image](https://github.com/user-attachments/assets/28447745-f8af-400e-a383-71a2d10431c8)

7. Community Forum
![image](https://github.com/user-attachments/assets/37680b72-840d-472e-9510-75ca30370f48)

### SITE SCREENSHOT
1. Dashboard
![image](https://github.com/user-attachments/assets/2d3b729b-4955-42f3-a3fa-8d2283b2d244)

2. Workout Tracker
![image](https://github.com/user-attachments/assets/5ab37d8c-b0ef-4563-86cd-42fe7f05b4f8)

3. Nutrition Tracker
//image

4. Goal and Progress
![image](https://github.com/user-attachments/assets/8098bf04-54b4-46cc-bd13-f02fc536cf9a)

5. Daily Motivation
//image
 ![Screenshot 2025-06-12 161948](https://github.com/user-attachments/assets/d88c8f8b-729e-4a80-892c-afb39bd2b238)

6. Community Forum
   - Community Index Page
![image](https://github.com/user-attachments/assets/d507383b-403d-465d-a57a-8f1ee317373b)

   - Discussion Page
![image](https://github.com/user-attachments/assets/5e25d409-823d-42b5-90bd-8139a91ef379)

   - Workout Sharing Page
![image](https://github.com/user-attachments/assets/7fd2bc44-6720-41cd-b113-7c6a0967334a)

### CHALLENGES
 - Integrating different modules developed by various team members due to differences in coding styles, database structures, and logic flows, requiring effective coordination and consistent collaboration throughout the project.
 - Getting the motivations.index when trying to run due to confusion with the existence of table or name of the file
 - There was a conflict when implement the authentication with Laravel Jetstream, where caused several errors and issues throughtout the entire project. As a result our team encountered by manually resolve and implement the necessary changes ourselves.
 - Our team faced a situations where everything worked excellently on our own branches on GitHub without any errors. But once branches were merged, conflicts and errors appear which leading to problems that affected the final product.
 - During the process of pulling the merged branch, some team members faced difficulties executing the migration files successfully.

### REFERENCES
- https://www.visual-paradigm.com/guide/uml-unified-modeling-language/what-is-sequence-diagram/
- https://www.myfitnesspal.com
