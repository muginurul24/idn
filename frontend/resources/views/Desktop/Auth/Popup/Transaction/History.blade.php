<x-desktop.popup-layout>
    <form method="post" action="#">
        <div class="box_table">
            <div>
                <div class="navsub">
                    <span id="typeDateF" style="line-height:26px;">
                        <span>Date</span>
                        <span class="input-append date" id="transDateF" data-date="{{ now()->format('Y-m-d') }}"
                            data-date-format="yyyy-mm-dd" style="margin-right:10px;margin-bottom:0;">
                            <input id="dateFrom" size="6" type="text" readonly="readonly"
                                value="{{ now()->format('Y-m-d') }}"
                                style="padding:3px;border-radius:2px;width:100px;margin-bottom:0;" />
                            <span class="add-on glyphicon-class" style="padding:3px;"><i
                                    class="icon-calendar"></i></span>
                        </span>
                    </span>
                    <span id="typeDateT" style="line-height:26px;">
                        <span>To</span>
                        <span class="input-append date" id="transDateT" data-date="{{ now()->format('Y-m-d') }}"
                            data-date-format="yyyy-mm-dd" style="margin-right:10px;margin-bottom:0;">
                            <input id="dateTo" size="6" type="text" readonly="readonly"
                                value="{{ now()->format('Y-m-d') }}"
                                style="padding:3px;border-radius:2px;width:100px;margin-bottom:0;" />
                            <span class="add-on glyphicon-class" style="padding:3px;"><i
                                    class="icon-calendar"></i></span>
                        </span>
                    </span>
                    <span>Transaction Type:</span>
                    <select id="typeTransaction" class="box_inp"
                        style="width: 150px; margin-right: 5px;margin-bottom: 2px;">
                        <option selected="selected" value="">--Select--</option>
                        <option value="deposit">Deposit</option>
                        <option value="manual">Fund Transfer</option>
                        <option value="withdraw">Withdrawal</option>
                    </select>
                    <div style="display: inline-block; margin-top: 5px;">
                        <input type="button" onclick="searchIt()" class="btn-blue" value="Submit" id="sub" />
                    </div>
                    <div class="pull-right">
                        <a href="#" onclick="todayList()" class="btn-green">Today</a>
                        <a href="#" onclick="last10()" class="btn-blue">Last 10 Transaction</a>
                    </div>
                </div>
                <table id="st-list" cellspacing="0" rules="all" border="0"
                    style="width:100%;border-collapse:collapse;">
                    <tr>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Remark</th>
                    </tr>
                    @foreach ($transactions as $key => $transaction)
                        <tr class="{{ $key % 2 == 0 ? 'evenrow' : 'oddrow' }}">
                            <td class="tleft" align="left">{{ $transaction->created_at }}</td>
                            <td class="tleft" align="left">{{ $transaction->type }}</td>
                            <td>{{ number_format($transaction->amount, 2, ',', '.') }}</td>
                            <td class="tcenter"><span class="status-{{ Str::replaceMatches(['/approved/', '/rejected/'], ['approve', 'reject'], $transaction->status) }}">{{ $transaction->status }}</span></td>
                            <td class="tright">{{ Str::title($transaction->type) }} Request</td>
                        </tr>
                    @endforeach
                </table>
                <div style="display: flex; justify-content: center; margin: .5rem 0;">
                </div>
            </div>
        </div>
    </form>
</x-desktop.popup-layout>
