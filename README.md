# Yuppie - Poff

It is an application that includes graphical and locational filtering of the text field shares that users write with the `Yuppie`, `Ehh` and `Poff` buttons they choose according to their emotional state.

## Technology 

1. HTML
2. CSS
3. JavaScript
	i. EChart.js
5. PHP
	ii. phpMyAdmin

## Pages

1. Homepage 
2. Login
	1. User Login
	2. Admin Login 
3. Sign Up
4. Profile
5. About
6. Privacy Policy

### Homepage;

#### Chart

<img src="./echart.png" alt="Yuppie-Poff Chart" width="500">

#### Three Buttons, Text Area and Submit Button  :

` Yuppie : 😄 ` ` Ehh : 😐 ` ` Poff : 😕 ` <br><br>
What do you think? <br>
>> | `You can write up to 255 characters...` |

```mermaid
sequenceDiagram
Alice ->> Bob: Hello Bob, how are you?
Bob-->>John: How about you John?
Bob--x Alice: I am good thanks!
Bob-x John: I am good thanks!
Note right of John: Bob thinks a long<br/>long time, so long<br/>that the text does<br/>not fit on a row.

Bob-->Alice: Checking with John...
Alice->John: Yes... John, how are you?
```

`Submit`
### Usage

1. `Emoji` : The user will choose an emoji suitable for their mood. 

2. `Text` : The user will write their thoughts in the text field.

3. `Submit` : The user will share his/her emotional state with the submit button. 

4. `Chart` : The emojis he chose in his post; 

	i. The first one `😄`, will have an instant upward effect on the chart with a value of +1. <br><br>
	ii. The second one `😐`, will instantly affect the graph horizontally with a value of 0. <br><br>
	iii. The third one `😕`, will instantaneously affect the graph in a downward direction with a value of -1.

### Flow Chart

```mermaid
graph LR
A((Yuppie)) -- -1 --> B((Ehh)) -- +1 --> A((Yuppie)) -- -2 --> C((Poff)) -- +2 --> A((Yuppie))
B((Ehh)) -- -1 --> C((Poff))
B((Ehh)) -- +1 --> C((Poff))
```

5. `Latest Updates` section; <br><br>
	i. Profile Photo, <br><br>
	ii. Emoji, <br><br>
	iii. Shared Text (with Date and Time information). <br>

> Note: Under the Recent Updates section, the 10 people who have posted most recently will be listed, the most recent will be at the top.

6. `Featured` section; <br><br>
	i. Each user will have an up button and a down button next to their post; other users will be able to highlight that person's post with the up and down buttons or vice versa. <br><br>
	ii. The upward button will be reflected as a +1 contribution to the sender's Score on their profile. <br><br>
	iii. The down button will be reflected as a -1 contribution to the sender's Score on their profile. <br>

> Note : Under the Featured section, the highest `Score` holder will appear in 1st place. Ranked from 1st to 10th place. The score will be determined by the number of clicks on the up button of the person who posted.
