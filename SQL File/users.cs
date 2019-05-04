using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Laravel
{
    #region Users
    public class Users
    {
        #region Member Variables
        protected int _ID;
        protected string _NAME;
        protected string _EMAIL;
        protected int _PHONE;
        protected string _IMAGE;
        protected unknown _created_at;
        protected unknown _updated_at;
        #endregion
        #region Constructors
        public Users() { }
        public Users(string NAME, string EMAIL, int PHONE, string IMAGE, unknown created_at, unknown updated_at)
        {
            this._NAME=NAME;
            this._EMAIL=EMAIL;
            this._PHONE=PHONE;
            this._IMAGE=IMAGE;
            this._created_at=created_at;
            this._updated_at=updated_at;
        }
        #endregion
        #region Public Properties
        public virtual int ID
        {
            get {return _ID;}
            set {_ID=value;}
        }
        public virtual string NAME
        {
            get {return _NAME;}
            set {_NAME=value;}
        }
        public virtual string EMAIL
        {
            get {return _EMAIL;}
            set {_EMAIL=value;}
        }
        public virtual int PHONE
        {
            get {return _PHONE;}
            set {_PHONE=value;}
        }
        public virtual string IMAGE
        {
            get {return _IMAGE;}
            set {_IMAGE=value;}
        }
        public virtual unknown Created_at
        {
            get {return _created_at;}
            set {_created_at=value;}
        }
        public virtual unknown Updated_at
        {
            get {return _updated_at;}
            set {_updated_at=value;}
        }
        #endregion
    }
    #endregion
}