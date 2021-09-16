export default class Gate{

    constructor(user){
        this.user =user;
    }

    isAdmin(){
        return this.user.type === 'Admin';
    }
    isUser(){
        return this.user.type === 'user';
    }
    isDispatch(){
        return this.user.type === 'Dispatch';
    }
    isEmployee(){
        return this.user.type === 'Employee';
    }
    isCustom(){
        return this.user.type === 'Customs';
    }
    isPayment(){
        return this.user.payment === 'Payment';
    }
}