namespace php Xin.Thrift.Notice
namespace go vendor.notice

struct Email{
    1: string   email;
    2: string   name;
}

struct EmailContent{
    1: string   title;
    2: string   content;
    3: i64      searchNumber;
    4: string   searchCode;
}

service Notice {
    // 发送邮件
    bool sendEmail(1:list<Email> emails, 2: EmailContent content);
}