<x-mobile.layout>
    <div class="container mb-20">

        <div class="forms">
            <form method="post" action="#" autocomplete="off">
                @csrf
                <div class="mt-10 mb-5p">Start Date :</div>
                <div class="form-group">
                    <input id="dateFrom" class="form-control" type="text" data-date-format="yyyy-mm-dd"
                        value="{{ now()->format('Y-m-d') }}" />
                </div>
                <div class="mb-5p">End Date :</div>
                <div class="form-group">
                    <input id="dateTo" class="form-control" type="text" data-date-format="yyyy-mm-dd"
                        value="{{ now()->format('Y-m-d') }}" />
                </div>
                <div class="mb-5p">Transaction Type :</div>
                <div class="form-group">
                    <select id="typeTransaction" class="form-control">
                        <option value="">-- Select --</option>
                        <option value="deposit" {{ request()->get('type') == 'deposit' ? 'selected' : '' }}>Deposit
                        </option>
                        <option value="manual" {{ request()->get('type') == 'manual' ? 'selected' : '' }}>Fund Transfer
                        </option>
                        <option value="withdraw" {{ request()->get('type') == 'withdraw' ? 'selected' : '' }}>Withdrawal
                        </option>
                    </select>
                </div>
                <button type="button" onclick="searchIt()"
                    class="btn btn-primary btn-block mt-10 btn-lg text-uppercase" data-loading-text="Loading..."
                    autocomplete="off">Kirim</button>
                <table class="mt-20 table table-history">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $key => $transaction)
                            <tr class="{{ $key % 2 == 0 ? 'evenrow' : 'oddrow' }}">
                                <td>{{ $transaction->created_at }}</td>
                                <td>{{ $transaction->type }}</td>
                                <td>{{ number_format($transaction->amount, 2, ',', '.') }}</td>
                                <td><span class="status-{{ Str::replaceMatches(['/approved/', '/rejected/'], ['approve', 'reject'], $transaction->status) }}">{{ $transaction->status }}</span></td>
                                <td>{{ Str::title($transaction->type) }} Request</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="display: flex;justify-content: center;margin: .5rem 0;">
                </div>
            </form>
        </div>
    </div>
</x-mobile.layout>
