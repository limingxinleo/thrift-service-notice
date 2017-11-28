namespace php Xin.Thrift.Notice
namespace go vendor.notice

exception ThriftException {
  1: i32 code,
  2: string message
}

struct Email {
    1: string   email;
    2: string   name;
}

struct EmailContent {
    1: string   title;
    2: string   content;
    3: i64      searchNumber = 0;
    4: string   searchCode = "";
}

struct EmailInfo {
    1: EmailContent emailContent;
    2: list<Email>  target;
    3: i16          status;
}

struct EmailSearch {
    1: i64      searchNumber;
    2: string   searchCode;
    3: i32      pageIndex = 0;
    4: i32      pageSize = 10;
}

struct Sms {
    1: string               mobile;
    2: string               content = "";
    3: string               template = "";
    4: map<string,string>   data;
    5: i64                  searchNumber = 0;
    6: string               searchCode = "";
}

service Notice {
    // 发送邮件
    bool sendEmail(1:list<Email> emails, 2: EmailContent content) throws (1:ThriftException ex);

    // 查询邮件
    list<EmailInfo> getEmailList(1:EmailSearch input) throws (1:ThriftException ex);

    // 发送短信
    bool sendSms(1:list<Sms> sms) throws (1:ThriftException ex);

    // 推送钉钉自定义机器人文本消息
    bool sendDtRobotText(1:string text, 2:string url) throws(1:ThriftException ex);
}