<x-mobile.layout>
    <div class="container mb-20">
        <div class="forms">
            <form method="post" action="#">
                <div class="box_table">
                    <div>
                        <div class="navsub">
                            <span>Period:</span>
                            <select id="period"
                                style="width: 35%; margin-right: 5px;margin-bottom: 2px; background: transparent; border: 1px solid #0092b1;">
                                <option style="font-color:black;" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">{{ \Carbon\Carbon::now()->format('Y-m-d') }}</option>
                                <option disabled="">------------------------------------------</option>
                                <option value="{{ now()->addDays(1)->format('Y-m-d') }}"> {{ now()->addDays(1)->format('Y-m-d') }} </option>
                                <option value="{{ now()->addDays(2)->format('Y-m-d') }}"> {{ now()->addDays(2)->format('Y-m-d') }} </option>
                                <option value="{{ now()->addDays(3)->format('Y-m-d') }}"> {{ now()->addDays(3)->format('Y-m-d') }} </option>
                                <option value="{{ now()->addDays(4)->format('Y-m-d') }}"> {{ now()->addDays(4)->format('Y-m-d') }} </option>
                                <option value="{{ now()->addDays(5)->format('Y-m-d') }}"> {{ now()->addDays(5)->format('Y-m-d') }} </option>
                            </select>
                            <div style="display: inline-block; margin-top: 5px; margin-bottom: 10px;">
                                <input type="button" onclick="searchIt()" class="btn-blue btn" value="Submit"
                                    id="sub" />
                            </div>
                        </div>
                        <table id="st-list" cellspacing="0" rules="all" border="0"
                            style="width:100%;border-collapse:collapse;">
                            <tr>
                                <th>No</th>
                                <th>Game</th>
                                <th class="text-center">Bonus Amount</th>
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
        </div>
    </div>
</x-mobile.layout>
