<!DOCTYPE html>
<html>
    <head>
        <title>Sample</title>
    
    <?php include('views/partials/head.php') ?>
    
    <style type="text/css">
        
        @import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);

*,
*::before,
*::after {
  box-sizing: border-box;
}

body {
  margin: 0;
  color: #666;
  background-color: #f6f6f6;
  font: 1em/1 'Open Sans', sans-serif;
}

a {
  text-decoration: none;
}

/*.container {*/
/*  position: absolute;*/
/*  left: calc(50% - 400px);*/
/*  width: 800px;*/
/*  margin: 60px auto;*/
/*}*/

.year {
  margin: 0 0 8px;
  color: #548383;
  text-align: center;
  font-size: 4em;
}

.description {
  margin: 0 0 64px;
  color: #acc2c2;
  text-align: center;
  font-size: 2em;
}

ul {
  display: flex;
  flex-wrap: wrap;
  width: 740px;
  margin: -14px auto -14px;
  padding: 0;
  list-style: none;
}

/* Safari/iOS fix: Adjusting both z-index and transform on <article>
   causes text anti-aliasing to die within subsequent <article>
   elements during the transition. Moving z-index to the parent <li>
   fixes this. */
li {
  position: relative;
  z-index: 1;
  width: 25%;
  height: 160px;
  transition: z-index;
  transition-delay: .4s;
}

article {
  position: absolute;
  top: 50%;
  left: 50%;
  border-bottom: 8px solid #dfe7e7;
  background-color: #fff;
  cursor: pointer;
  transform: translate(-50%, -50%) scale(.25);
  transition: transform .4s;
}

/* Firefox fix: The outline style stretches to include absolutely
   positioned child elements (in this case, the offset dismiss
   button). This looks weird. The fix is to have a <div> with no
   child elements, position it to have the same edges as <article>,
   and apply the outline style there. */
.outline {
  position: absolute;
  z-index: -1;
  top: 0;
  bottom: -8px;
  left: 0;
  right: 0;
}

article:focus {
  outline: none;
}

article:focus .outline {
  outline: 4px solid #dab08c;
}

.dismiss {
  display: block;
  opacity: 0;
  position: absolute;
  top: -28px;
  right: -28px;
  width: 48px;
  height: 48px;
  border: 4px solid #fff;
  border-radius: 50%;
  color: #fff;
  background-color: #666;
  cursor: pointer;
  transition: opacity .4s;
}

.dismiss::before {
  content: '\f00d';
  display: block;
  position: absolute;
  top: 50%;
  left: 50%;
  font: 1.7em/1 'FontAwesome';
  transform: translate(-50%, -50%);
}

.binding {
  height: 40px;
  background-color: #dab08c;
}

.binding::before,
.binding::after {
  content: '';
  display: block;
  position: absolute;
  top: 8px;
  width: 24px;
  height: 24px;
  border-radius: 50%;
  background-color: #fff;
}

.binding::before {
  left: 25%;
}

.binding::after {
  right: 25%;
}

article h1 {
  height: 52px;
  margin: 16px;
  text-align: center;
  font-size: 3.2em;
}

table {
  width: 592px;
  margin: 16px;
  table-layout: fixed;
  border-collapse: separate;
  border-spacing: 4px;
}

th {
  position: relative;
  width: 80px;
  height: 32px;
  padding: 0 0 12px;
  text-align: center;
}

th::after {
  content: '';
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 80px;
  height: 20px;
  background-color: #acc2c2;
  transition: opacity .4s;
}

td {
  position: relative;
  width: 80px;
  height: 64px;
  padding: 4px;
  vertical-align: top;
  background-color: #dfe7e7;
}

td:empty {
  background-color: transparent;
}

.is-holiday {
  color: #fff;
  background-color: #548383;
}

.day {
  opacity: 0;
  font-size: 1.1em;
  font-weight: bold;
  transition: opacity .4s;
}

.split {
  position: absolute;
  bottom: 4px;
  right: 4px;
}

.holiday {
  opacity: 0;
  margin-top: 8px;
  font-size: .8em;
  transition: opacity .4s;
}

.notes {
  width: 708px;
  margin: 64px auto 0;
  color: #548383;
  line-height: 1.8;
}

.inactive {
  pointer-events: none;
}

/* Chrome/Safari/iOS fix: Bumping up the z-index from the start of
   the expand animation until the end of the shrink animation
   prevents unnecessary repaints on subsequent <article> elements. */
.active {
  z-index: 2;
  transition-delay: 0s;
}

.active article {
  cursor: auto;
  transform: translate(-50%, -50%) scale(1);
}

li:nth-child(4n+1).active article {
  transform: translate(calc(-50% + 220px), -50%) scale(1);
}
li:nth-child(4n+2).active article {
  transform: translate(calc(-50% + 36px), -50%) scale(1);
}
li:nth-child(4n+3).active article {
  transform: translate(calc(-50% - 36px), -50%) scale(1);
}
li:nth-child(4n+4).active article {
  transform: translate(calc(-50% - 220px), -50%) scale(1);
}

.active .dismiss,
.active .day,
.active .holiday {
  opacity: 1;
}

/* Chrome/Safari/iOS fix: The centered "Sun" text jumps to the right
   when the transition ends. Oddly enough, setting text-indent to 0%
   prevents this. */
.active th {
  text-indent: 0%;
}

.active th::after {
  opacity: 0;
}

          </style>
        

    
    </head>
    <body>
        
       
  <h1 class="year">&mdash; 2015 &mdash;</h1>
  <h2 class="description">Twelve month calendar of holidays *</h2>
  <ul>
    <li>
      <article tabindex="0">
        <div class="outline"></div>
        <div class="dismiss"></div>
        <div class="binding"></div>
        <h1>January</h1>
        <table>
          <thead>
            <tr>
              <th>Sun</th>
              <th>Mon</th>
              <th>Tue</th>
              <th>Wed</th>
              <th>Thu</th>
              <th>Fri</th>
              <th>Sat</th>
            </tr>
          </thead>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="is-holiday">
              <div class="day">1</div>
              <div class="holiday">New Year's Day</div>
            </td>
            <td><div class="day">2</div></td>
            <td><div class="day">3</div></td>
          </tr>
          <tr>
            <td><div class="day">4</div></td>
            <td><div class="day">5</div></td>
            <td><div class="day">6</div></td>
            <td><div class="day">7</div></td>
            <td><div class="day">8</div></td>
            <td><div class="day">9</div></td>
            <td><div class="day">10</div></td>
          </tr>
          <tr>
            <td><div class="day">11</div></td>
            <td><div class="day">12</div></td>
            <td><div class="day">13</div></td>
            <td><div class="day">14</div></td>
            <td><div class="day">15</div></td>
            <td><div class="day">16</div></td>
            <td><div class="day">17</div></td>
          </tr>
          <tr>
            <td><div class="day">18</div></td>
            <td class="is-holiday">
              <div class="day">19</div>
              <div class="holiday">MLK Day</div>
            </td>
            <td><div class="day">20</div></td>
            <td><div class="day">21</div></td>
            <td><div class="day">22</div></td>
            <td><div class="day">23</div></td>
            <td><div class="day">24</div></td>
          </tr>
          <tr>
            <td><div class="day">25</div></td>
            <td><div class="day">26</div></td>
            <td><div class="day">27</div></td>
            <td><div class="day">28</div></td>
            <td><div class="day">29</div></td>
            <td><div class="day">30</div></td>
            <td><div class="day">31</div></td>
          </tr>
        </table>
      </article>
    </li>
    
    
    
    <li>
      <article tabindex="0">
        <div class="outline"></div>
        <div class="dismiss"></div>
        <div class="binding"></div>
        <h1>February</h1>
        <table>
          <thead>
            <tr>
              <th>Sun</th>
              <th>Mon</th>
              <th>Tue</th>
              <th>Wed</th>
              <th>Thu</th>
              <th>Fri</th>
              <th>Sat</th>
            </tr>
          </thead>
          <tr>
            <td><div class="day">1</div></td>
            <td><div class="day">2</div></td>
            <td><div class="day">3</div></td>
            <td><div class="day">4</div></td>
            <td><div class="day">5</div></td>
            <td><div class="day">6</div></td>
            <td><div class="day">7</div></td>
          </tr>
          <tr>
            <td><div class="day">8</div></td>
            <td><div class="day">9</div></td>
            <td><div class="day">10</div></td>
            <td><div class="day">11</div></td>
            <td><div class="day">12</div></td>
            <td><div class="day">13</div></td>
            <td class="is-holiday">
              <div class="day">14</div>
              <div class="holiday">Valentine's Day</div>
            </td>
          </tr>
          <tr>
            <td><div class="day">15</div></td>
            <td class="is-holiday">
              <div class="day">19</div>
              <div class="holiday">Presidents' Day</div>
            </td>
            <td><div class="day">17</div></td>
            <td><div class="day">18</div></td>
            <td><div class="day">19</div></td>
            <td><div class="day">20</div></td>
            <td><div class="day">21</div></td>
          </tr>
          <tr>
            <td><div class="day">22</div></td>
            <td><div class="day">23</div></td>
            <td><div class="day">24</div></td>
            <td><div class="day">25</div></td>
            <td><div class="day">26</div></td>
            <td><div class="day">27</div></td>
            <td><div class="day">28</div></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </table>
      </article>
    </li>
    
    
    
    <li>
      <article tabindex="0">
        <div class="outline"></div>
        <div class="dismiss"></div>
        <div class="binding"></div>
        <h1>March</h1>
        <table>
          <thead>
            <tr>
              <th>Sun</th>
              <th>Mon</th>
              <th>Tue</th>
              <th>Wed</th>
              <th>Thu</th>
              <th>Fri</th>
              <th>Sat</th>
            </tr>
          </thead>
          <tr>
            <td><div class="day">1</div></td>
            <td><div class="day">2</div></td>
            <td><div class="day">3</div></td>
            <td><div class="day">4</div></td>
            <td><div class="day">5</div></td>
            <td><div class="day">6</div></td>
            <td><div class="day">7</div></td>
          </tr>
          <tr>
            <td><div class="day">8</div></td>
            <td><div class="day">9</div></td>
            <td><div class="day">10</div></td>
            <td><div class="day">11</div></td>
            <td><div class="day">12</div></td>
            <td><div class="day">13</div></td>
            <td><div class="day">14</div></td>
          </tr>
          <tr>
            <td><div class="day">15</div></td>
            <td><div class="day">16</div></td>
            <td><div class="day">17</div></td>
            <td><div class="day">18</div></td>
            <td><div class="day">19</div></td>
            <td><div class="day">20</div></td>
            <td><div class="day">21</div></td>
          </tr>
          <tr>
            <td><div class="day">22</div></td>
            <td><div class="day">23</div></td>
            <td><div class="day">24</div></td>
            <td><div class="day">25</div></td>
            <td><div class="day">26</div></td>
            <td><div class="day">27</div></td>
            <td><div class="day">28</div></td>
          <tr>
            <td><div class="day">29</div></td>
            <td><div class="day">30</div></td>
            <td><div class="day">31</div></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </table>
      </article>
    </li>
    
    
    
    <li>
      <article tabindex="0">
        <div class="outline"></div>
        <div class="dismiss"></div>
        <div class="binding"></div>
        <h1>April</h1>
        <table>
          <thead>
            <tr>
              <th>Sun</th>
              <th>Mon</th>
              <th>Tue</th>
              <th>Wed</th>
              <th>Thu</th>
              <th>Fri</th>
              <th>Sat</th>
            </tr>
          </thead>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><div class="day">1</div></td>
            <td><div class="day">2</div></td>
            <td><div class="day">3</div></td>
            <td><div class="day">4</div></td>
          </tr>
          <tr>
            <td class="is-holiday">
              <div class="day">5</div>
              <div class="holiday">Easter</div>
            </td>
            <td><div class="day">6</div></td>
            <td><div class="day">7</div></td>
            <td><div class="day">8</div></td>
            <td><div class="day">9</div></td>
            <td><div class="day">10</div></td>
            <td><div class="day">11</div></td>
          </tr>
          <tr>
            <td><div class="day">12</div></td>
            <td class="is-holiday">
              <div class="day">13</div>
              <div class="holiday">Jefferson's Birthday</div>
            </td>
            <td><div class="day">14</div></td>
            <td><div class="day">15</div></td>
            <td><div class="day">16</div></td>
            <td><div class="day">17</div></td>
            <td><div class="day">18</div></td>
          </tr>
          <tr>
            <td><div class="day">19</div></td>
            <td><div class="day">20</div></td>
            <td><div class="day">21</div></td>
            <td><div class="day">22</div></td>
            <td><div class="day">23</div></td>
            <td><div class="day">24</div></td>
            <td><div class="day">25</div></td>
          </tr>
          <tr>
            <td><div class="day">26</div></td>
            <td><div class="day">27</div></td>
            <td><div class="day">28</div></td>
            <td><div class="day">29</div></td>
            <td><div class="day">30</div></td>
            <td><div class="day">30</div></td>
            <td><div class="day">30</div></td>
          </tr>
        </table>
      </article>
    </li>
    
    
    
    <li>
      <article tabindex="0">
        <div class="outline"></div>
        <div class="dismiss"></div>
        <div class="binding"></div>
        <h1>May</h1>
        <table>
          <thead>
            <tr>
              <th>Sun</th>
              <th>Mon</th>
              <th>Tue</th>
              <th>Wed</th>
              <th>Thu</th>
              <th>Fri</th>
              <th>Sat</th>
            </tr>
          </thead>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><div class="day">1</div></td>
            <td><div class="day">2</div></td>
          </tr>
          <tr>
            <td><div class="day">3</div></td>
            <td><div class="day">4</div></td>
            <td><div class="day">5</div></td>
            <td><div class="day">6</div></td>
            <td><div class="day">7</div></td>
            <td><div class="day">8</div></td>
            <td><div class="day">9</div></td>
          </tr>
          <tr>
            <td class="is-holiday">
              <div class="day">10</div>
              <div class="holiday">Mothers' Day</div>
            </td>
            <td><div class="day">11</div></td>
            <td><div class="day">12</div></td>
            <td><div class="day">13</div></td>
            <td><div class="day">14</div></td>
            <td><div class="day">15</div></td>
            <td><div class="day">16</div></td>
          </tr>
          <tr>
            <td><div class="day">17</div></td>
            <td><div class="day">18</div></td>
            <td><div class="day">19</div></td>
            <td><div class="day">20</div></td>
            <td><div class="day">21</div></td>
            <td><div class="day">22</div></td>
            <td><div class="day">23</div></td>
          </tr>
          <tr>
            <td>
              <div class="day">24</div>
              <div class="day split">31</div>
            </td>
            <td class="is-holiday">
              <div class="day">25</div>
              <div class="holiday">Memorial Day</div>
            </td>
            <td><div class="day">26</div></td>
            <td><div class="day">27</div></td>
            <td><div class="day">28</div></td>
            <td><div class="day">29</div></td>
            <td><div class="day">30</div></td>
          </tr>
        </table>
      </article>
    </li>
    
    
    <li>
      <article tabindex="0">
        <div class="outline"></div>
        <div class="dismiss"></div>
        <div class="binding"></div>
        <h1>June</h1>
        <table>
          <thead>
            <tr>
              <th>Sun</th>
              <th>Mon</th>
              <th>Tue</th>
              <th>Wed</th>
              <th>Thu</th>
              <th>Fri</th>
              <th>Sat</th>
            </tr>
          </thead>
          <tr>
            <td></td>
            <td><div class="day">1</div></td>
            <td><div class="day">2</div></td>
            <td><div class="day">3</div></td>
            <td><div class="day">4</div></td>
            <td><div class="day">5</div></td>
            <td><div class="day">6</div></td>
          </tr>
          <tr>
            <td><div class="day">7</div></td>
            <td><div class="day">8</div></td>
            <td><div class="day">9</div></td>
            <td><div class="day">10</div></td>
            <td><div class="day">11</div></td>
            <td><div class="day">12</div></td>
            <td><div class="day">13</div></td>
          </tr>
          <tr>
            <td><div class="day">14</div></td>
            <td><div class="day">15</div></td>
            <td><div class="day">16</div></td>
            <td><div class="day">17</div></td>
            <td><div class="day">18</div></td>
            <td><div class="day">19</div></td>
            <td><div class="day">20</div></td>
          </tr>
          <tr>
            <td class="is-holiday">
              <div class="day">21</div>
              <div class="holiday">Fathers' Day</div>
            </td>
            <td><div class="day">22</div></td>
            <td><div class="day">23</div></td>
            <td><div class="day">24</div></td>
            <td><div class="day">25</div></td>
            <td><div class="day">26</div></td>
            <td><div class="day">27</div></td>
          </tr>
          <tr>
            <td><div class="day">28</div></td>
            <td><div class="day">29</div></td>
            <td><div class="day">30</div></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </table>
      </article>
    </li>
    <li>
      <article tabindex="0">
        <div class="outline"></div>
        <div class="dismiss"></div>
        <div class="binding"></div>
        <h1>July</h1>
        <table>
          <thead>
            <tr>
              <th>Sun</th>
              <th>Mon</th>
              <th>Tue</th>
              <th>Wed</th>
              <th>Thu</th>
              <th>Fri</th>
              <th>Sat</th>
            </tr>
          </thead>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><div class="day">1</div></td>
            <td><div class="day">2</div></td>
            <td><div class="day">3</div></td>
            <td class="is-holiday">
              <div class="day">4</div>
              <div class="holiday">Indepen-dence Day</div>
            </td>
          </tr>
          <tr>
            <td><div class="day">5</div></td>
            <td><div class="day">6</div></td>
            <td><div class="day">7</div></td>
            <td><div class="day">8</div></td>
            <td><div class="day">9</div></td>
            <td><div class="day">10</div></td>
            <td><div class="day">11</div></td>
          </tr>
          <tr>
            <td><div class="day">12</div></td>
            <td><div class="day">13</div></td>
            <td><div class="day">14</div></td>
            <td><div class="day">15</div></td>
            <td><div class="day">16</div></td>
            <td><div class="day">17</div></td>
            <td><div class="day">18</div></td>
          </tr>
          <tr>
            <td><div class="day">19</div></td>
            <td><div class="day">20</div></td>
            <td><div class="day">21</div></td>
            <td><div class="day">22</div></td>
            <td><div class="day">23</div></td>
            <td><div class="day">24</div></td>
            <td><div class="day">25</div></td>
          </tr>
          <tr>
            <td><div class="day">26</div></td>
            <td><div class="day">27</div></td>
            <td><div class="day">28</div></td>
            <td><div class="day">29</div></td>
            <td><div class="day">30</div></td>
            <td><div class="day">31</div></td>
            <td></td>
          </tr>
        </table>
      </article>
    </li>
    <li>
      <article tabindex="0">
        <div class="outline"></div>
        <div class="dismiss"></div>
        <div class="binding"></div>
        <h1>August</h1>
        <table>
          <thead>
            <tr>
              <th>Sun</th>
              <th>Mon</th>
              <th>Tue</th>
              <th>Wed</th>
              <th>Thu</th>
              <th>Fri</th>
              <th>Sat</th>
            </tr>
          </thead>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><div class="day">1</div></td>
          </tr>
          <tr>
            <td><div class="day">2</div></td>
            <td><div class="day">3</div></td>
            <td><div class="day">4</div></td>
            <td><div class="day">5</div></td>
            <td><div class="day">6</div></td>
            <td><div class="day">7</div></td>
            <td><div class="day">8</div></td>
          </tr>
          <tr>
            <td><div class="day">9</div></td>
            <td><div class="day">10</div></td>
            <td><div class="day">11</div></td>
            <td><div class="day">12</div></td>
            <td><div class="day">13</div></td>
            <td><div class="day">14</div></td>
            <td><div class="day">15</div></td>
          </tr>
          <tr>
            <td><div class="day">16</div></td>
            <td><div class="day">17</div></td>
            <td><div class="day">18</div></td>
            <td><div class="day">19</div></td>
            <td><div class="day">20</div></td>
            <td><div class="day">21</div></td>
            <td><div class="day">22</div></td>
          </tr>
          <tr>
            <td>
              <div class="day">23</div>
              <div class="day split">30</div>
            </td>
            <td>
              <div class="day">24</div>
              <div class="day split">31</div>
            </td>
            <td><div class="day">25</div></td>
            <td><div class="day">26</div></td>
            <td><div class="day">27</div></td>
            <td><div class="day">28</div></td>
            <td><div class="day">29</div></td>
          </tr>
        </table>
      </article>
    </li>
    <li>
      <article tabindex="0">
        <div class="outline"></div>
        <div class="dismiss"></div>
        <div class="binding"></div>
        <h1>September</h1>
        <table>
          <thead>
            <tr>
              <th>Sun</th>
              <th>Mon</th>
              <th>Tue</th>
              <th>Wed</th>
              <th>Thu</th>
              <th>Fri</th>
              <th>Sat</th>
            </tr>
          </thead>
          <tr>
            <td></td>
            <td></td>
            <td><div class="day">1</div></td>
            <td><div class="day">2</div></td>
            <td><div class="day">3</div></td>
            <td><div class="day">4</div></td>
            <td><div class="day">5</div></td>
          </tr>
          <tr>
            <td><div class="day">6</div></td>
            <td class="is-holiday">
              <div class="day">7</div>
              <div class="holiday">Labor Day</div>
            </td>
            <td><div class="day">8</div></td>
            <td><div class="day">9</div></td>
            <td><div class="day">10</div></td>
            <td><div class="day">11</div></td>
            <td><div class="day">12</div></td>
          </tr>
          <tr>
            <td><div class="day">13</div></td>
            <td><div class="day">14</div></td>
            <td><div class="day">15</div></td>
            <td><div class="day">16</div></td>
            <td><div class="day">17</div></td>
            <td><div class="day">18</div></td>
            <td><div class="day">19</div></td>
          </tr>
          <tr>
            <td><div class="day">20</div></td>
            <td><div class="day">21</div></td>
            <td><div class="day">22</div></td>
            <td><div class="day">23</div></td>
            <td><div class="day">24</div></td>
            <td><div class="day">25</div></td>
            <td><div class="day">26</div></td>
          </tr>
          <tr>
            <td><div class="day">27</div></td>
            <td><div class="day">28</div></td>
            <td><div class="day">29</div></td>
            <td><div class="day">30</div></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </table>
      </article>
    </li>
    <li>
      <article tabindex="0">
        <div class="outline"></div>
        <div class="dismiss"></div>
        <div class="binding"></div>
        <h1>October</h1>
        <table>
          <thead>
            <tr>
              <th>Sun</th>
              <th>Mon</th>
              <th>Tue</th>
              <th>Wed</th>
              <th>Thu</th>
              <th>Fri</th>
              <th>Sat</th>
            </tr>
          </thead>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><div class="day">1</div></td>
            <td><div class="day">2</div></td>
            <td><div class="day">3</div></td>
          </tr>
          <tr>
            <td><div class="day">4</div></td>
            <td><div class="day">5</div></td>
            <td><div class="day">6</div></td>
            <td><div class="day">7</div></td>
            <td><div class="day">8</div></td>
            <td><div class="day">9</div></td>
            <td><div class="day">10</div></td>
          </tr>
          <tr>
            <td><div class="day">11</div></td>
            <td class="is-holiday">
              <div class="day">12</div>
              <div class="holiday">Columbus Day</div>
            </td>
            <td><div class="day">13</div></td>
            <td><div class="day">14</div></td>
            <td><div class="day">15</div></td>
            <td><div class="day">16</div></td>
            <td><div class="day">17</div></td>
          </tr>
          <tr>
            <td><div class="day">18</div></td>
            <td><div class="day">19</div></td>
            <td><div class="day">20</div></td>
            <td><div class="day">21</div></td>
            <td><div class="day">22</div></td>
            <td><div class="day">23</div></td>
            <td><div class="day">24</div></td>
          </tr>
          <tr>
            <td><div class="day">25</div></td>
            <td><div class="day">26</div></td>
            <td><div class="day">27</div></td>
            <td><div class="day">28</div></td>
            <td><div class="day">29</div></td>
            <td><div class="day">30</div></td>
            <td class="is-holiday">
              <div class="day">31</div>
              <div class="holiday">Halloween</div>
            </td>
          </tr>
        </table>
      </article>
    </li>
    <li>
      <article tabindex="0">
        <div class="outline"></div>
        <div class="dismiss"></div>
        <div class="binding"></div>
        <h1>November</h1>
        <table>
          <thead>
            <tr>
              <th>Sun</th>
              <th>Mon</th>
              <th>Tue</th>
              <th>Wed</th>
              <th>Thu</th>
              <th>Fri</th>
              <th>Sat</th>
            </tr>
          </thead>
          <tr>
            <td><div class="day">1</div></td>
            <td><div class="day">2</div></td>
            <td><div class="day">3</div></td>
            <td><div class="day">4</div></td>
            <td><div class="day">5</div></td>
            <td><div class="day">6</div></td>
            <td><div class="day">7</div></td>
          </tr>
          <tr>
            <td><div class="day">8</div></td>
            <td><div class="day">9</div></td>
            <td><div class="day">10</div></td>
            <td class="is-holiday">
              <div class="day">11</div>
              <div class="holiday">Veterans Day</div>
            </td>
            <td><div class="day">12</div></td>
            <td><div class="day">13</div></td>
            <td><div class="day">14</div></td>
          </tr>
          <tr>
            <td><div class="day">15</div></td>
            <td><div class="day">16</div></td>
            <td><div class="day">17</div></td>
            <td><div class="day">18</div></td>
            <td><div class="day">19</div></td>
            <td><div class="day">20</div></td>
            <td><div class="day">21</div></td>
          </tr>
          <tr>
            <td><div class="day">22</div></td>
            <td><div class="day">23</div></td>
            <td><div class="day">24</div></td>
            <td><div class="day">25</div></td>
            <td class="is-holiday">
              <div class="day">26</div>
              <div class="holiday">Thanks-giving Day</div>
            </td>
            <td><div class="day">27</div></td>
            <td><div class="day">28</div></td>
          </tr>
          <tr>
            <td><div class="day">29</div></td>
            <td><div class="day">30</div></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </table>
      </article>
    </li>
    <li>
      <article tabindex="0">
        <div class="outline"></div>
        <div class="dismiss"></div>
        <div class="binding"></div>
        <h1>December</h1>
        <table>
          <thead>
            <tr>
              <th>Sun</th>
              <th>Mon</th>
              <th>Tue</th>
              <th>Wed</th>
              <th>Thu</th>
              <th>Fri</th>
              <th>Sat</th>
            </tr>
          </thead>
          <tr>
            <td></td>
            <td></td>
            <td><div class="day">1</div></td>
            <td><div class="day">2</div></td>
            <td><div class="day">3</div></td>
            <td><div class="day">4</div></td>
            <td><div class="day">5</div></td>
          </tr>
          <tr>
            <td><div class="day">6</div></td>
            <td><div class="day">7</div></td>
            <td><div class="day">8</div></td>
            <td><div class="day">9</div></td>
            <td><div class="day">10</div></td>
            <td><div class="day">11</div></td>
            <td><div class="day">12</div></td>
          </tr>
          <tr>
            <td><div class="day">13</div></td>
            <td><div class="day">14</div></td>
            <td><div class="day">15</div></td>
            <td><div class="day">16</div></td>
            <td><div class="day">17</div></td>
            <td><div class="day">18</div></td>
            <td><div class="day">19</div></td>
          </tr>
          <tr>
            <td><div class="day">20</div></td>
            <td><div class="day">21</div></td>
            <td><div class="day">22</div></td>
            <td><div class="day">23</div></td>
            <td class="is-holiday">
              <div class="day">24</div>
              <div class="holiday">Christmas Eve</div>
            </td>
            <td class="is-holiday">
              <div class="day">25</div>
              <div class="holiday">Christmas Day</div>
            </td>
            <td><div class="day">26</div></td>
          </tr>
          <tr>
            <td><div class="day">27</div></td>
            <td><div class="day">28</div></td>
            <td><div class="day">29</div></td>
            <td><div class="day">30</div></td>
            <td class="is-holiday">
              <div class="day">31</div>
              <div class="holiday">New Year's Eve</div>
            </td>
            <td></td>
            <td></td>
          </tr>
        </table>
      </article>
    </li>
  </ul>
  <div class="notes">
    * Shows nationally recognized holidays and observances in the United States. The exception is Columbus Day, which is not recognized in AK, AR, CA, DE, FL, HI, MI, MN, ND, NV, OR, SD, TX, VT, WA, WI, and WY.
  </div>


  
    
    <script type="text/javascript">
        function activate(e) {
  var $wrapper = $(e.currentTarget).parent();
  $wrapper
    .addClass('active')
    .siblings().addClass('inactive');
}

function dismiss(e) {
  var $wrapper = $(e.currentTarget).closest('li');
  $wrapper
    .removeClass('active')
    .siblings().removeClass('inactive');
  e.stopPropagation();
}

function checkKey(e) {
  var $wrapper = $(e.currentTarget).parent();
  var isActive = $wrapper.hasClass('active');
  if (isActive && (e.keyCode === 13 || e.keyCode === 27)) {
    // active and hit enter or escape
    dismiss(e);
  } else if (!isActive && e.keyCode === 13) {
    // not active and hit enter
    activate(e);
  }
}

$('article').on({
  'click': activate,
  'blur': dismiss,
  'keyup': checkKey
});
$('.dismiss').on('click', dismiss);

        
    </script>


    </body>
</html>