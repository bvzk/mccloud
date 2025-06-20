<form action="#" method="post" class="bg-white 2xl:w-[60%] lg:w-[65%] md:min-w-[68%] md:max-w-[68%] rounded-[22px]
        2xl:pt-[117px] 2xl:px-[146px] 2xl:pb-[96px]
        xl:pt-[167px] xl:px-[102px] xl:pb-[144px]
        lg:pt-[40px] lg:px-[38px] lg:pb-[63px]
        md:pt-[30px] md:px-[36px] md:pb-[70px]
        pt-[21px] px-[20px] pb-[22px]">
    <div class="title-text-2 font-bold mb-[48px]"><?=$formTitle;?></div>
    <div class="grid md:grid-cols-2 grid-cols-1 md:gap-[32px]">
        <div class="form-group">
            <label for="">Ваше ім’я</label>
            <input type="text" name="name" class="form-control" placeholder="Введіть ім’я">
        </div>
        <div class="form-group">
            <label for="">Email *</label>
            <input type="email" name="email" class="form-control" placeholder="example@example.com" required>
        </div>
    </div>
    <div class="grid md:grid-cols-2 md:gap-[32px]">
        <div class="form-group">
            <label for="">Телефон</label>
            <input type="text" name="phone" class="form-control" placeholder="+38 XXX XXX XX XX">
        </div>
        <div class="form-group">
            <label for="">Вебсайт</label>
            <input type="website" name="text" class="form-control" placeholder="www.example.com">
        </div>
    </div>
    <div class="form-group">
        <label for="helpMessage">Ваше повідомлення</label>
        <textarea name="message" id="helpMessage" class="form-control" rows="5" placeholder="Текст повідомлення"></textarea>
    </div>
    <button class="btn btn-lg btn-success w-full md:w-auto" onclick="consult.send(); return false">Надіслати</button>
</form>