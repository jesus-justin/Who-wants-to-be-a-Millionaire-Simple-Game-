# Leaderboard Separation by Difficulty - TODO

## Task: Separate/divide the leaderboards of each difficulty from each other

### Steps to Complete:

1. **Modify save_score.php**
   - Add difficulty parameter handling
   - Update JSON structure to nest scores by difficulty
   - Ensure backward compatibility with existing scores

2. **Update index.php**
   - Modify leaderboard display to show separate sections for each difficulty
   - Update form submission to include difficulty
   - Add tabs or sections for easy, medium, hard leaderboards

3. **Modify questions.js**
   - Pass current difficulty when submitting score to save_score.php
   - Update form submission logic
   - Add JavaScript for leaderboard tab switching

4. **Test and Verify**
   - Test score saving with different difficulties
   - Verify leaderboard displays correctly separated
   - Check edge cases (no scores for a difficulty)

### Current Status:
- [x] Step 1: Modify save_score.php
- [x] Step 2: Update index.php
- [x] Step 3: Modify questions.js
- [ ] Step 4: Test and verify
