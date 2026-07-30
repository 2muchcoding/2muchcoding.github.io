  - Database table structure for comments
  My comment system used a table called siteComments with basic fields: an id, name, email, comment text, an optional feature suggestion, and a timestamp. The structure was simple and just stored the information needed to display each comment on the page. The timestamp updated automatically, and the table also had a status field for “approved,” even though all comments are auto-approved right now.

  - How to test the comment system
  To test the system, I submitted different comments and checked if they showed up correctly on the page and inside the database through phpMyAdmin. I tested empty fields, normal inputs, and longer comments to make sure everything saved properly. I also refreshed the page to make sure the comments loaded in the right order and that the form didn’t resubmit by accident.

  - Which sections used AI assistance
  I used AI mainly for the PHP parts like setting up the database insert code, fixing connection errors, and helping with the loop that displays comments. AI also helped clean up my CSS and make the comment boxes look neat. It was especially helpful when something broke and I couldn’t figure out what small detail I missed.
  
  - Any resources (besides AI) you consulted
  I used phpMyAdmin to check what was actually going into my database, and I looked at course examples from earlier labs to remember how form handling works. I also skimmed a few PHP function references online just to double-check the syntax for things like mysqli and htmlspecialchars.
