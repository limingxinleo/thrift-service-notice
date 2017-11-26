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
}

struct EmailSearch {
    1: i64      searchNumber;
    2: string   searchCode;
    3: i32      pageIndex = 0;
    4: i32      pageSize = 10;
}

service Notice {
    // 发送邮件
    bool sendEmail(1:list<Email> emails, 2: EmailContent content) throws (1:ThriftException ex);

    // 查询邮件
    list<EmailInfo> getEmailList(1:EmailSearch input) throws (1:ThriftException ex);
}