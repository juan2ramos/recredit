<section class="Modal row justify-center align-middle Faq-Modal  is-hidden" id="faqModal">
    <div class="Modal-content row Contact-content">
        <div class="Modal-contentClose modalClose">X</div>
        <div class=" table-container">
            <table class="Faq-modalTable">
                <thead>
                <tr>
                    <th>Taza mÍnima legal EA</th>
                    <th>Taza mÍnima legal EA</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Cuotas</td>
                    <td>Interés</td>
                </tr>
                @for($i = 1; $i < 13 ; $i++)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$i*2.34}}%</td>
                    </tr>
                @endfor
                </tbody>
            </table>
        </div>
    </div>
</section>
