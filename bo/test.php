


<form name='formsend1' method='post' action='separate_58.php'>
    <tr>
      <td width="36%" align='right' valign='top'><font color='#0000FF'><b>Phone Number :</b></font> </td>
      <td width="64%" align='left'><textarea name='number_phone' id="tel" cols='30' rows='5' wrap='VIRTUAL' onfocus="setcount();" onchange="setcount();"  onblur="setcount();" onselect="setcount();" class='boxi'></textarea>
        <br>
        <span class='tiny'><font color="#009900">ส่ง หลายหมายเลขให้ใช้คอมม่า (,) คั่น<br />
          เช่น 0814445555,0897776666</font></span></td></tr>
    <tr>
      <td align='right' valign='top'><font color="#0000FF">
        <input type="hidden" name="lang" value="eng" />
        <b>Message :</b></font> </td>
      <td align='left'><textarea name='text_msg' id="text_msg" cols='30' rows='6' wrap='virtual' onkeydown="" onchange="setcount();" onfocus="setcount();"  onkeypress="setcount();" class='boxi'></textarea>
        <br />
        <input readonly="readonly" type="text" name="restcha" value="0"  class='boxi' size="2" />
        <font color='#0000FF'>/</font>
        <input readonly="readonly" type="text" name="maxcha" value="0"  class='boxi' size="2" />
        <font color='#0000FF'>Characters</font>      
        <input readonly="readonly" type="text" name="numcha" value="0"  class='boxi' size="1" /> 
        <span class="style5">sms</span></td></tr>
    <tr>
      <td align='right'><font color='#0000FF'><b>Message Credit :</b></font> </td>
      <td align='left'><input type="hidden" name="musecre" value="0" />
          <input type="hidden" name="restcre" value="2476" />
        <font color='#0000FF'><font id='jmusecre'>&nbsp;</font> <font color='#0000FF'>Credits
		        <input name="numcha2" type="hidden" value="" />
		  <input type="hidden" name="pasa" value="" />
		</font></font></td>
    </tr>
    <tr>
      <td></td>
      <td align='left' valign='top'><input type="hidden" name="id_sender" value="0891252408" />
    </td></tr><tr>
	    </tr><tr>
		<td></td>
		<td align='left' valign='top'><input type="hidden" name="id_sender" value="0891252408" />
    </td></tr><tr>
	    </tr><tr>
    <td valign="top"  align="right">ส่ง..</td>
	<td colspan="3">

	  <select name="send_time">
        <option value="1" selected="selected">ตอนนี้</option>
        <option value="2">ล่วงหน้า</option>
      </select>
	  <br />
	  <br />
	  
	  <p>
 <input name="YetAnotherDate"  type="text" readonly="readonly" size="12" />
<a onclick="displayDatePicker('YetAnotherDate', false, 'dmy', '.');" ><img src="images/b_calendar.png" alt="ปฏิทิน เพื่อส่งล่วงหน้า" width="16" height="16" id="button2" style='cursor:hand' /></a>	  </p>
	            <p>
      <label></label>
      <label>เวลา ชม.
      <select name="hour_1" id="hour_1">
      <option value="0">00</option>
	  <option value="1">01</option>
	  <option value="2">02</option>
	  <option value="3">03</option>
	  <option value="4">04</option>
	  <option value="5">05</option>
	  <option value="6">06</option>
      <option value="7">07</option>
      <option value="8">08</option>
      <option value="9">09</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
    </select>
    </label>
    <label>นาที
    <select name="mini" id="mini">
      <option value="0">00</option>
       <option value="15">15</option>
      <option value="30">30</option>
       <option value="45">45</option>
    </select>
    </label>
	    </p></td></tr><tr>
        <td></td>
        <td align='left' valign='top'><input type='button' name='send' value='ส่งข้อความ' onmousemove="Vulgarity();" onmouseout="checkNum();"  onmouseover="checkNumbers();" onmouseup="checkTel();" onclick='checkf();' class='buto1' />          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="button" type="button" class='buto1' onclick="form.reset()" value="ล้างข้อมูล" />
          <br /></td></tr></form>