@extends('front.layout')

@section('title', '個人情報保護方針 ｜'.config('app.title.aegis_explain'))

@section('body')
  @component('front.header.header', ['href' => route('front.index')])
    @include('front.header._link_admin_top')
    @include('front.header._link_mypage')
    @include('front.header._link_login_logout')
  @endcomponent
  @include('front.pages._drawer_contents')
  @include('front.pages._loader')

  <div class="l-container">
    <h1 class="p-level2Heading2 c-text--center">個人情報保護方針</h1>
    <div class="l-main">
      <div class="p-mainItem u-mt-20">
        <p class="c-text">株式会社Carecon（以下「<span class="c-text--bold">当社</span>」といいます。）は、当社が提供するフリーランスシステムエンジニア向け案件紹介サービスAegis（以下「<span class="c-text--bold">本サービス</span>」といいます。）における、ユーザーについての個人情報の取扱いについて、以下のとおりプライバシーポリシーを定めます。</p>
        <h2 class="p-level2Heading u-mt-20">第１条（個人情報）</h2>
          <p class="c-text">本ポリシーにおいて「個人情報」とは、個人情報保護法第２条で定められる、生存する個人に関する情報であって、当該情報に含まれる氏名、生年月日、住所、電話番号、連絡先その他の記述等により特定の個人を識別できる情報（他の情報と容易に照合することができ、それにより特定の個人を識別することができることとなるものを含みます。）を指します。</p>
          <p class="c-text u-mt-5">本サービスにおいて、当社が本サービスのユーザーから提供いただく情報は以下のとおりです。</p>
          <div class="u-pl-30">
            <p class="c-text u-mt-15">(1). 氏名</p>
            <p class="c-text u-mt-5">(2). 生年月日</p>
            <p class="c-text u-mt-5">(3). メールアドレス</p>
            <p class="c-text u-mt-5">(4). 電話番号</p>
            <p class="c-text u-mt-5">(5). 金融機関口座情報</p>
          </div>

        <h2 class="p-level2Heading u-mt-20">第２条（利用目的）</h2>
            <p class="c-text u-mt-10 u-mb-10">１. 本サービスの提供に関わる個人情報の利用目的は以下のとおりです。</p>
            <div class="u-pl-30">
                <p class="c-text u-mt-10">(1). 本サービスにおけるアカウント登録の受付、案件のご紹介、契約の締結、業務委託料のお支払いなど本サービスの提供、維持、保護及び改善のため</p>
                <p class="c-text u-mt-5">(2). 本サービスに関するお問合せ等への対応のため</p>
                <p class="c-text u-mt-5">(3). 本サービスに関する利用規約及びポリシー（以下「<span class="c-text--bold">利用規約等</span>」といいます。）に違反する行為に対応するため</p>
                <p class="c-text u-mt-5">(4). 利用規約等の変更を通知するため</p>
                <p class="c-text u-mt-5">(5). 上記の利用目的に付随する利用目的のため</p>
            </div>
            <p class="c-text u-mt-15 u-mb-10">２. 当社は、変更前の利用目的と合理的関連性を有すると認められる場合に限り、前項の利用目的を変更できるものとします。利用目的の変更を行った場合には、本サービスのウェブサイト（<a class="c-text--primary" target="_blank" rel="noopener noreferrer" href="https://aegis-freelance.jp/">https://aegis-freelance.jp/</a>）への掲載など当社所定の方法により、ユーザーに通知するものとします。</p>

        <h2 class="p-level2Heading u-mt-20">第３条（第三者提供）</h2>
          <p class="c-text">当社は、原則として、ユーザーの事前の同意を得ることなく、第三者に個人情報を提供することはありません。<br>ただし、以下の場合はこの限りではありません。</p>
          <div class="u-pl-30">
            <p class="c-text u-mt-15">(1). 当社が利用目的の達成に必要な範囲内において個人情報の取扱いの全部または一部を委託する場合</p>
            <p class="c-text u-mt-5">(2). 合併その他の事由による事業の承継に伴って個人情報が提供される場合</p>
            <p class="c-text u-mt-5">(3). 国の機関若しくは地方公共団体又はその委託を受けた者が法令の定める事務を遂行することに対して協力する必要がある場合であって、ユーザーの同意を得ることによって当該事務の遂行に支障を及ぼす恐れがある場合</p>
            <p class="c-text u-mt-5">(4). その他個人情報保護法その他の法令で定められる場合</p>
          </div>

        <h2 class="p-level2Heading u-mt-20">第４条（個人情報の開示）</h2>
         <p class="c-text">当社は、ユーザーから、個人情報保護法の定めに基づき個人情報の開示を求められたときは、ユーザー本人からの請求であることを確認の上で、ユーザーに対し、遅滞なく開示を行います。<br>ただし、個人情報保護法その他の法令により当社が開示の義務を負わない場合は、この限りではありません。<br>なお、個人情報の開示につきましては、手数料として１件当たり１０００円を頂戴します。</p>

        <h2 class="p-level2Heading u-mt-20">第５条（個人情報の訂正及び利用停止）</h2>
          <p class="c-text">１. 当社は、以下の場合は、ユーザー本人からの請求であることを確認の上で、遅滞なく調査を行い、その結果に基づいて個人情報の内容の訂正又は利用停止を行い、その旨をユーザーに通知します。<br>なお、訂正又は利用停止を行わない旨の決定をしたときは、ユーザーにその旨を通知します。</p>
          <div class="u-pl-30">
            <p class="c-text u-mt-10">(1). 個人情報が真実でないという理由によって、個人情報保護法の定めに基づき、個人情報の内容の訂正をユーザーから求められた場合</p>
            <p class="c-text u-mt-5">(2). 予め公表された利用目的の範囲を超えて取り扱われているという理由、又は、偽りその他不正の手段により収集されたものであるという理由により、個人情報保護法の定めに基づき、個人情報の利用の停止をユーザーから求められた場合</p>
          </div>
          <p class="c-text u-mt-15">２. 個人情報その他の法令により、当社が訂正又は利用停止の義務を負わない場合は、前項の規定は適用されません。</p>

        <h2 class="p-level2Heading u-mt-20">第６条（プライバシーポリシーの変更手続き）</h2>
          <p class="c-text">当社は、個人情報の取扱いに関する運用状況を踏まえ、必要に応じて本ポリシーを変更することがあります。</p>
          <p class="c-text u-mt-5">プライバシーポリシーを変更した場合は、本サービスのウェブサイト（<a class="c-text--primary" target="_blank" rel="noopener noreferrer" href="https://aegis-freelance.jp/">https://aegis-freelance.jp/</a>）への掲載など当社所定の方法により、ユーザーに通知するものとします。</p>
          <p class="c-text u-mt-5">ただし、当該変更のうち、法令上ユーザーの同意が必要となるものについては、別途ユーザーから同意を得るものとします。</p>

        <h2 class="p-level2Heading u-mt-20">第７条（お問合せ窓口）</h2>
          <p class="c-text">当社の個人情報の取扱いに関する御意見、御質問、苦情のお申出などについては、次の窓口までお願いいたします。</p>
          <p class="c-text u-mt-10">株式会社Carecon</p>
          <p class="c-text u-mt-5">住所：〒150-000　東京都渋谷区渋谷1-1-11　青山SIビル4階</p>
          <p class="c-text u-mt-5">担当部署：管理部</p>
          <p class="c-text u-mt-5">E-Mail：info@care-con.co.jp</p>
          <p class="c-text u-mt-50 u-fs-16">【制定日】２０２１年７月１日</p>
      </div>
    </div>
  </div>

  @include('front.footer.footer')
@endsection
