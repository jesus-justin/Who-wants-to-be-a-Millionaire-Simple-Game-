# Who-wants-to-be-a-Millionaire-Simple-Game-
Personal Game Project (Simple and for Fun)

## Overview
A fun interactive trivia game based on the "Who Wants to Be a Millionaire" format with multiple difficulty levels and features.

## Features
- Multiple difficulty levels (Easy, Medium, Hard, Anime Edition)
- Score leaderboard tracking
- Lifeline mechanics
- Theme switching
- Achievements tracking

## Installation & Setup
1. Place files in a web server directory (XAMPP or similar)
2. Access via browser: `http://localhost/Who-wants-to-be-a-Millionaire-Simple-Game-/`
3. Enter player name and select difficulty to start

## Technologies Used
- HTML5 for structure
- CSS3 for styling with animations
- JavaScript (Vanilla) for game logic
- PHP for score persistence
- JSON for score storage

## How to Play
1. Select your difficulty level
2. Answer trivia questions correctly
3. Use lifelines if needed (50:50, Phone, Audience, Swap, Hint)
4. Build your streak and climb the leaderboard
5. Unlock achievements as you progress

## Game Features
### Difficulty Levels
- **Easy**: Perfect for beginners (20 questions of varying difficulty)
- **Medium**: Challenging facts and knowledge (20 questions)
- **Hard**: Expert-level questions requiring specialized knowledge (20 questions)
- **Anime Edition**: Specialized questions for anime fans (20+ anime-related questions)

### Lifelines (5 Total)
- **50:50**: Removes two incorrect answers, leaving you with a 50/50 choice
- **Phone a Friend**: Get advice (60-100% confident) from a friend
- **Audience Poll**: See what the audience thinks with a visual bar chart
- **Swap Question**: Replace the current question with another from the pool
- **Hint**: Shows the first letter of the answer and disables one wrong option

### Achievements (5 Total)
- 🏆 **First Win**: Win your first game
- 🔥 **Hot Streak**: Answer 5 questions correctly in a row
- 💰 **Millionaire**: Reach ₱1,000,000 in a single game
- 🎌 **Anime Master**: Win the Anime Edition difficulty
- ⚡ **Under 1 Second**: Answer a question in under 1 second

### Game Mechanics
- **Streak Bonuses**: Correct answers give multipliers (2x at 3+, 3x at 5+, 5x at 10+)
- **Confetti Celebrations**: Visual confetti effects on streaks (3+) and victories
- **Timer Bar**: Visual countdown bar showing remaining time (30 seconds per question)
- **Statistics Tracking**: Games played, win rate, accuracy, best streak, average response time
- **Theme System**: Classic, Dark, and Neon themes available
- **Keyboard Shortcuts**: 1-4 for options, F=50:50, P=Phone, A=Audience, S=Swap, H=Hint

### LocalStorage Features
- Settings persist across sessions (difficulty, player name, theme, category)
- Achievements unlock and stay permanently
- Statistics accumulate across all games
- Leaderboard scores saved by difficulty level

## API Reference
### Backend
- **save_score.php**: POST endpoint for saving player scores with validation
  - Parameters: `player` (string), `score` (integer), `difficulty` (easy/medium/hard/animeEdition)
  - Saves only if new score is higher than previous best for that difficulty

### LocalStorage Keys
- `millionaireSettings`: Player preferences (JSON)
- `millionaireAchievements`: Unlocked achievements (JSON)
- `millionaireStatistics`: Cumulative game statistics (JSON)

## Browser Support
- Chrome/Edge: Full support
- Firefox: Full support
- Safari: Full support
- Mobile browsers: Responsive design with sidebar toggle

## License
Personal project - Free to use and modify

