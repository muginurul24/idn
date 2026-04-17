<x-desktop.popup-layout>
    <form method="post" action="#">
        <div class="box_table">
            <div>
                <div class="navsub">
                    <span>Period :</span>
                    <select id="period" class="box_inp" style="width: 250px; margin-right: 5px;margin-bottom: 2px;">
                        <option value="2025-05-05">2025-05-05</option>
                        <option disabled="">------------------------------------------</option>
                        <option value="2025-05-05"> 2025-05-05 </option>
                        <option value="2025-04-28"> 2025-04-28 </option>
                        <option value="2025-04-21"> 2025-04-21 </option>
                        <option value="2025-04-14"> 2025-04-14 </option>
                        <option value="2025-04-07"> 2025-04-07 </option>
                    </select>
                    <div style="display: inline-block; margin-top: 5px;">
                        <input type="button" onclick="searchIt()" class="btn-blue" value="Submit" id="sub" />
                    </div>
                </div>
                <table id="st-list" cellspacing="0" rules="all" border="0"
                    style="width:100%;border-collapse:collapse;">
                    <tr>
                        <th>No</th>
                        <th>Game</th>
                        <th class="text-center">Jumlah Bonus</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th> Total </th>
                        <th class="text-right">0,00</th>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</x-desktop.popup-layout>
