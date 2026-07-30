# ITWS 1100 Fall 2025 - Quiz 3
**Due date on LMS11:59:59 PM**
Anoua Carrie
---

## Instructions
* Place your name on the top of this document
* All written answers must be in be in ~Your Own Words~, using complete sentences and proper grammar
* Make sure your answers use an alternative font and/or color – (not red, and not Comic Sans, etc.)
* Create a development branch for this quiz.  Tag it properly.
* Place all documents including this one in a folder ~inside~ your iit folder named:
  `Quiz3`
* Save this document as:
  `ITWS1100-F25-Quiz3-yourRCSID-yourname.md`
* When finished make sure you extract your SQL database (include the CREATE statement) – save the output as yourRCSID-website.sql. Place it in your Quiz3 folder
* When finished with the quiz, zip your entire repository including all related files into a file named:
  `ITWS1100-F25-Quiz3-yourRCSID-yourname.zip`
* And submit it to LMS
* Merge your changes using a PR, into production and deploy. Then close your PR (don’t delete) and your issue
* Do not forget your read me

Remember to save as you go,
Good luck!

## Part 1: Full-Stack Site Enhancement (60 Points)
 
### Core Requirements (50 points)

Building on your previous labs - specifically Labs 3, 3b, 8 and 9,  you will add a **visitor comment system** using AI assistance.

#### Database Setup (10 points)
Create a new database in MariaDB, named, `mySite`,  then create a table named `mySiteComments` with (at least) the following:
- Primary key (auto-increment, 2 bytes)
- Visitor name (required)
- Email address (required)
- Comment text (required)
- Timestamp (auto-generated)
- Status field (approved/pending - for future admin moderation)

**Required**: Use proper data types and constraints.

#### Comment Display & Submission (40 points)

Using PHP,  add a comment entry form to your home page for visitors to enter comments.  It can be a form on your home page, or a link to a new page, etc, but it must be a form that calls a php page with a POST request, that includes:

**Display Section:**
- Shows all approved comments in reverse chronological order (newest first)
- Each comment displays: name, date/time, comment text, and feature suggestion (if provided)
- If no comments exist, show a friendly message
- Basic styling with CSS to make it readable and professional

**Submission Form:**
- Fields for: Name, Email, Comment, Feature Suggestion (optional)
- Client-side validation using JavaScript/jQuery (all required fields must be filled)
- Server-side validation using PHP (check for empty fields, valid email format)
- On successful submission: display success message and clear form
- On error: display specific error message and preserve user input

**Critical Security Requirement:**
- ALL database queries MUST use mysqli prepared statements
- Properly escape/sanitize all user input
- Refer to Lab 9 examples for prepared statement syntax

**AI Assistance Requirement:**
- Use AI tools (ChatGPT, Claude, GitHub Copilot, etc.) to help you build this feature
- You should prompt AI for code structure, SQL queries, form validation, etc.
- You MUST understand and be able to explain every line of code you submit
- Include comments in your code indicating which sections used AI assistance

**Code Quality:**
- Use PHP includes for header/footer/menu (maintain modular structure)
- Proper indentation and readable code
- Comments explaining your logic (especially AI-assisted sections)

---

### Stretch Goal: Weather Widget (10 bonus points possible)

Add current weather information to your site using a weather API and jQuery:

**Resources Provided:**
- Weather API Documentation: [OpenWeatherMap API](https://openweathermap.org/api) (free tier)
- jQuery AJAX can be used for this

**Requirements:**
- Display current weather for RPI campus (or user's location)
- Show temperature, conditions, and icon
- Use jQuery `$.ajax()` or `$.getJSON()` to fetch data
- Handle errors gracefully (if API fails, show friendly message)
- Update at least once when page loads
- Style it nicely (doesn't need to be fancy, just clean)

**Note**: You'll need to register for a free API key - they have documentation on their site

---

### Submission Requirements for Part 1:
- All files properly organized in your `iit` folder on the server
- Include `README.md` documenting:
  - Database table structure for comments
  - How to test the comment system
  - Which sections used AI assistance
  - Any resources (besides AI) you consulted
- **Include `AI_PROMPTS.txt`**: Save 3-5 actual prompts you used with AI and brief notes on the results

---

## Part 2: Reflection on AI-Assisted Development (40 Points)

Write a reflective essay (500-750 words) addressing the following:

### Required Topics:

**1. AI as Assistant vs. Worker (15 points)**
- Describe your experience using AI to build the comment system
- Give specific examples where AI helped you learn/understand
- Give specific examples where AI generated code you didn't understand (and what you did about it)
- Do you agree with the pedagogical approach of "using AI as a tool" rather than banning it? Why or why not?

**2. Code Understanding & Ownership (15 points)**
- How did you ensure you understood AI-generated code?
- What was one piece of AI-generated code you had to modify or fix, and why?
- Did using AI make you lazy, or did it free you up to focus on harder problems? Explain with examples.
- What would you have done differently if AI tools weren't available?

**3. Future Career Concerns (10 points)**
- How do you think AI tools will change what it means to be a "good programmer"?
- What skills do you think will become MORE important because of AI?
- What skills might become LESS important?

### Format Requirements:
- Submit as `reflection.pdf` or `reflection.md`
- 500-750 words (quality over quantity)
- Use specific examples from your work on this quiz
- Be honest - there are no "wrong" opinions, only unsupported ones
- Cite any sources if you reference external articles/research

---

## Grading Rubric

### Part 1: Technical Implementation (60 points)
| Component             | Points    | Criteria                                                     |
|-----------------------|-----------|--------------------------------------------------------------|
| Database Table        | 10        | Proper structure, data types, constraints                    |
| Comment Display       | 15        | Shows comments correctly, good SQL query, prepared statements |
| Comment Form          | 15        | All fields, validation (client & server), good UX            |
| Submission Processing | 10        | Prepared statements, sanitization, error handling            |
| Code Quality          | 10        | Modular, commented, readable, includes AI annotations        |
| **Stretch: Weather**  | **+0-10** | Working API integration, jQuery AJAX, error handling         |

### Part 2: Reflection (40 points)
| Component | Points | Criteria |
|-----------|--------|----------|
| AI as Assistant | 15 | Thoughtful analysis, specific examples, clear position |
| Code Understanding | 15 | Self-awareness, examples of debugging/learning |
| Career Impact | 10 | Considers multiple perspectives, forward-thinking |

---

## Helpful Resources

### Comment System:
- Lab 9: Prepared Statements Example
- PHP mysqli Documentation: [php.net/manual/en/book.mysqli.php](https://www.php.net/manual/en/book.mysqli.php)
- SQL Injection Prevention: [OWASP Guide](https://cheatsheetseries.owasp.org/cheatsheets/SQL_Injection_Prevention_Cheat_Sheet.html)

### Weather API (Stretch Goal):
- OpenWeatherMap API: [openweathermap.org/api](https://openweathermap.org/api)
- jQuery AJAX: [api.jquery.com/jquery.ajax](https://api.jquery.com/jquery.ajax/)
- Example: [Will provide sample code structure on LMS]

### AI Tools You May Use:
- ChatGPT (OpenAI)
- Claude (Anthropic)
- GitHub Copilot
- Any other AI coding assistant

### GitHub Actions (Optional Reading):
If you're interested in automated testing and deployment:
- [GitHub Actions Documentation](https://docs.github.com/en/actions)
- [CI/CD Concepts](https://www.redhat.com/en/topics/devops/what-is-ci-cd)

---

## Important Notes

1. **Plagiarism**: Using AI is required, but copying code you don't understand is still academic dishonesty. You must be able to explain every line.

2. **Prepared Statements**: This is NON-NEGOTIABLE. Any SQL injection vulnerabilities will result in significant point deductions.

3. **Testing**: Test your comment system thoroughly:
   - Try submitting empty forms
   - Try SQL injection attempts (e.g., entering `'; DROP TABLE siteComments; --` in a field)
   - Try XSS attempts (e.g., entering `<script>alert('XSS')</script>`)
   - Your site should handle all of these safely

4. **Due Date**: EoD on the date posted on LMS.  up to 8 hours late -30%, beyonf=d that = 0.

---

Good luck, and remember: AI is your co-pilot, not your autopilot!